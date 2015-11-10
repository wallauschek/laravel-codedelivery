<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
{
    public function __construct(
        OrderRepository $repository,
        UserRepository $userRepository,
        OrderService $service

        ){
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->service = $service;
    }

    public function index(){
        $id = Authorizer::getResourceOwnerId();
        $orders = $this->repository->scopeQuery(function($query) use($id){
            return $query->with('items')->where('user_deliveryman_id', '=', $id);
        })->paginate();

        return $orders;
    }



    public function  show($id){
        $idDeliveryman = Authorizer::getResourceOwnerId();

        return $this->repository->getByIdAndDeliveryman($id, $idDeliveryman);
    }

    public function updateStatus(Request $request, $id){
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $order = $this->service->updateStatus($id,$idDeliveryman,$request->get('status'));
        if($order){
            return $order;
        }
        abort(400,"Order não encoontrado");
    }
}


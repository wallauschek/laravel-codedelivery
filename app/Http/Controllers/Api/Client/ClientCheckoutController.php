<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
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
        $id= Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;
        $orders = $this->repository->scopeQuery(function($query) use($clientId){
            return $query->with('items')->where('client_id', '=', $clientId);
        })->paginate();

        return $orders;
    }


    public function store(Request $request){
        $data = $request->all();
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;
        $data['client_id'] = $clientId;
        $o = $this->service->create($data);
        $o = $this->repository->with('items')->find($o->id);

        return $o;
    }

    public function  show($store){
        $o = $this->repository->with(['client', 'items', 'cupom'])->find($store);
        $o->items->each(function($item){
            $item->product;
        });
        $o->client->user;

        return $o;
    }
}


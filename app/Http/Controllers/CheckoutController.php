<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function __construct(
        OrderRepository $repository,
        UserRepository $userRepository,
        ProductRepository $ProductRepository

        ){
        $this->repository = $repository;
        $this->UserRepository = $userRepository;
        $this->ProductRepository = $productRepository;
    }


    public function create(){

        $products = $this->productRepository->lists();

        return view('customer.order.create', compact('products'));
    }

   
}

<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserController extends Controller
{
    private $repository;


    public function __construct(UserRepository $repository){
        $this->repository = $repository;
    }

    public function show(){
        $id = Authorizer::getResourceOwnerId();
        //dd($id);
        return $this->repository
        ->skipPresenter(false)
        ->find($id);
    }
}


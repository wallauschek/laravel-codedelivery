<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Services\ClientService;

class ClientsController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ClientRepository $repository, ClientService $clientService){
        $this->repository = $repository;
        $this->clientService = $clientService;
    }

    public function index(){

        $clients = $this->repository->paginate(5);

        return view('admin.clients.index', compact('clients'));

    }

    public function create(){

        return view('admin.clients.create');
    }

    public function store(AdminClientRequest $request){

        $data = $request->all();
        $this->clientService->create($data);

        return redirect()->route('admin.clients.index');

    }


    public function edit($id){
        $client = $this->repository->find($id);

        return view('admin.clients.edit', compact('client'));
    }

    public function update(AdminClientRequest $request, $id){


        // $client = $this->repository->update([
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'city' => $request->city,
        //     'state' => $request->state,
        //     'zipcode' => $request->zipcode,
        //     'user_id' => $id
        // ], $id);

        // $fields = [
        //     'name' => $request->name,
        //     'email' => $request->email
        // ];

        // if($request->password<>""){
        //     $fields['password'] =  bcrypt($request->password);
        // }

        // $this->userRepository->update($fields, $client->user->id);
        // 
        
        $data = $request->all();
        $this->clientService->update($data, $id);

        return redirect()->route('admin.clients.index');
    }
}

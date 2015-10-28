<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Models\User;

class ClientsController extends Controller
{
    public function __construct(ClientRepository $repository){
        $this->repository = $repository;
    }

    public function index(){

        $clients = $this->repository->paginate(5);

        return view('admin.clients.index', compact('clients'));

    }

    public function create(){

        return view('admin.clients.create');
    }

    public function store(AdminClientRequest $request){

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $this->repository->create([
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'user_id' => $user->id
        ]);

        dd($user);

        return redirect()->route('admin.clients.index');

    }

    public function edit($id){
        $client = $this->repository->find($id);

        return view('admin.clients.edit', compact('client'));
    }

    public function update(AdminClientRequest $request, $id){
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.clients.index');
    }
}

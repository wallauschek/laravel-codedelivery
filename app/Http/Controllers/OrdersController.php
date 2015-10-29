<?php

namespace CodeDelivery\Http\Controllers;

//use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;


class OrdersController extends Controller
{
    
    public function __construct(OrderRepository $repository){
        $this->repository = $repository;
    }

    public function index()
    {
        $orders = $this->repository->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id, userRepository $userRepository){
        $list_status = [0=>'Pendente',1=>'A caminho',2=>'entregue',3=>'Cancelado'];
        $order = $this->repository->find($id);

        $deliveryman = $userRepository->getDeliverymen();

        return view('admin.orders.edit', compact('order','list_status', 'deliveryman'));
    }

    
    public function update(Request $request, $id){
        $all = $request->all();
        $this->repository->update($all, $id);

        return redirect()->route('admin.orders.index');
    }
    
}

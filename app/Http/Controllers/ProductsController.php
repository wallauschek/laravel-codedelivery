<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Requests;
use CodeDelivery\Http\Requests\AdminProductRequest;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\CategoryRepository;

//use CodeDelivery\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository){
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }   

    public function index(){

        $products = $this->repository->paginate(5);

        return view('admin.products.index', compact('products'));

    }

    public function create(){
        $categories = $this->categoryRepository->lists(['name','id']);

        return view('admin.products.create', compact('categories'));
    }

    public function store(AdminProductRequest $request){

        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.products.index');

    }

    public function edit($id){
        $product = $this->repository->find($id);
        $categories = $this->categoryRepository->lists(['name','id']);


        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(AdminProductRequest $request, $id){
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.products.index');
    }

    public function destroy($id){
        $this->repository->delete($id);
        return redirect()->route('admin.products.index');
    }
}

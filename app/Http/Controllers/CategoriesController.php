<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function __construct(CategoryRepository $repository){
        $this->repository = $repository;
    }

    public function index(){

        $categories = $this->repository->paginate(5);

        return view('admin.categories.index', compact('categories'));

    }

    public function create(){

        return view('admin.categories.create');
    }

    public function store(AdminCategoryRequest $request){

        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.categories.index');

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreCategory;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function index(){
        $categories = $this->model->get();
        return view('admin.category.categories',compact('categories'));
    }
    public function store(StoreCategory $request){

        $this->model->create($request->except('_token'));

        return redirect()->back()->with('create','create category');
    }
    public function update(Request $request,$id){
        $this->model->where('id',$id)->update($request->except('_token'));

        return redirect()->back()->with('update','update category');
    }
    public function delete($id){
        $this->model->where('id',$id)->delete();

        return redirect()->back()->with('delete','delete category');
    }
}

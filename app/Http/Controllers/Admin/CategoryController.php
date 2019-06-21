<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreCategory;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

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
        $category = Category::create([
            'name' => $request->input('name')
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $request->image->extension();
            $location = public_path('assets/images/categories/' . $fileName);

            Image::make($image)->resize(180, 180)->save($location);
            chmod($location,0777);

           $category->image = $fileName;
        }
        $category->save();

        return redirect()->back()->with('create','created a category!');
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category) {
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request,$id){
        $this->model->where('id',$id)->update($request->except('_token'));

        return redirect()->back()->with('update','updated a category!');
    }
//    public function delete(Category $category){
//        $category->delete();
//        return redirect()->back()->with('delete','deleted a category!');
//    }
}

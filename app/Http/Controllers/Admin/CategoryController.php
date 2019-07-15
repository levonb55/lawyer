<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreCategory;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;

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

    /**
     * @param StoreCategory $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        if($request->hasFile('icon')) {
            $image = $request->file('icon');
            $fileName = time() . '-icon.' . $request->image->extension();
            $location = public_path('assets/images/categories/' . $fileName);

            Image::make($image)->resize(18, 20)->save($location);
            chmod($location,0777);

            $category->icon = $fileName;
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

    /**
     * @param StoreCategory $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreCategory $request, Category $category){

        Category::updateOrCreate(['id' => $category->id], [
            'name' => $request->input('name')
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $request->image->extension();
            $location = public_path('assets/images/categories/' . $fileName);

            Image::make($image)->resize(180, 180)->save($location);
            chmod($location,0777);

            $oldImage = $category->image;
            $oldImagePath = public_path('assets/images/categories/'. $oldImage);
            if ($oldImage && $oldImagePath) {
                File::delete($oldImagePath);
            }

            $category->image = $fileName;
//            $category->save();
        }

        if($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $fileName = time() . '-icon.' . $request->icon->extension();
            $location = public_path('assets/images/categories/' . $fileName);

            Image::make($icon)->resize(18, 20)->save($location);
            chmod($location,0777);

            $oldIcon = $category->icon;
            $oldIconPath = public_path('assets/images/categories/'. $oldIcon);
            if ($oldIcon && $oldIconPath) {
                File::delete($oldIconPath);
            }

            $category->icon = $fileName;
//            $category->save();
        }

        $category->save();

        return redirect()->route('admin_categories')->with('update','updated a category!');
    }
//    public function delete(Category $category){
//        $category->delete();
//        return redirect()->back()->with('delete','deleted a category!');
//    }
}

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
            $category->image = $this->storeFile(
                $request->file('image'), public_path('assets/images/categories/images/'), 180, 180
            );
        }

        if($request->hasFile('icon')) {
            $category->icon = $this->storeFile(
                $request->file('icon'), public_path('assets/images/categories/icons/'), 18, 20
            );
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
            $oldImage = $category->image;
            $oldImagePath = public_path('assets/images/categories/images/'. $oldImage);
            if ($oldImage && $oldImagePath) {
                File::delete($oldImagePath);
            }

            $category->image = $this->storeFile(
                $request->file('image'), public_path('assets/images/categories/images/'), 180, 180
            );
        }

        if($request->hasFile('icon')) {
            $oldIcon = $category->icon;
            $oldIconPath = public_path('assets/images/categories/icons/'. $oldIcon);
            if ($oldIcon && $oldIconPath) {
                File::delete($oldIconPath);
            }

            $category->icon = $this->storeFile(
                $request->file('icon'), public_path('assets/images/categories/icons/'), 18, 20
            );
        }

        $category->save();

        return redirect()->route('admin_categories')->with('update','updated a category!');
    }

    public function delete(Category $category){
        $category->lawyers()->detach();
        $category->delete();
        return redirect()->back()->with('delete','deleted a category!');
    }

    public function storeFile($image, $path, $width = null, $height = null) {
        $fileName = time() . '.' . $image->extension();
        $location = $path . $fileName;
        Image::make($image)->resize($width, $height)->save($location);
        chmod($location,0777);
        return $fileName;
    }
}

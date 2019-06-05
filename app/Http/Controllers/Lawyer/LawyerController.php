<?php

namespace App\Http\Controllers\Lawyer;

//use App\Http\Middleware\Lawyer;
use App\Http\Requests\UpdateLawyerInfo;
use App\Models\Admin\Category;
use App\Models\Lawyer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Image;

class LawyerController extends Controller
{
    public function index(User $lawyer){
        $categories = Category::all();

        return view('lawyer.dashboard', compact('lawyer', 'categories'));
    }
    public function messages(){
        return view('lawyer.chat');
    }
    public function calendar(){
        return view('lawyer.calendar');
    }

    /**
     * @param UpdateLawyerInfo $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateLawyerInfo $request, User $user) {

        if($request->hasFile('image')) {

            $image = $request->file('image');
            $fileName = time() . '.' . $request->image->extension();
            $location = public_path('assets/images/profile/' . $fileName);

            Image::make($image)->resize(140, 140)->save($location);
            chmod($location,0777);
            $oldImage = $user->image;
            $oldImagePath = public_path('assets/images/profile/'. $oldImage);

            if ($oldImage && $oldImagePath) {
                File::delete($oldImagePath);
            }

            $user->image = $fileName;
            $user->save();
        }

        $lawyer = Lawyer::where('user_id', $user->id)->first();
        $lawyer->category_id = $request->input('category_id');
        $lawyer->background = $request->input('background');
        $lawyer->save();

        Session::flash('success', 'You successfully updated your profile!');

        return back();

    }
}

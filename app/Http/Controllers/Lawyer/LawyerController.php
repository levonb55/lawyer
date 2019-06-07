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

    public function showLawyerProfile(User $lawyer) {
        $category = Category::find($lawyer->lawyer->category_id);

        return view('lawyer.show', compact('lawyer', 'category'));
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

//        dd($request->all());


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

//        $lawyer = Lawyer::where('user_id', $user->id)->first();

//        $lawyer->category_id = $request->input('category_id');
//        $lawyer->company = $request->input('company');
//        $lawyer->background = $request->input('background');
//        $lawyer->facebook = $request->input('facebook');
//        $lawyer->twitter = $request->input('twitter');
//        $lawyer->instagram = $request->input('instagram');
//        $lawyer->linkedin = $request->input('linkedin');
//        $lawyer->address = $request->input('address');
//        $lawyer->save();
        Lawyer::updateOrCreate([
            'user_id' => \Auth::id()
        ], [
            'category_id' => $request->input('category_id'),
            'company' => $request->input('company'),
            'address' => $request->input('address'),
            'background' => $request->input('background'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
            'linkedin' => $request->input('linkedin')
        ]);

        Session::flash('success', 'You successfully updated your profile!');

        return back();

    }

    public function showLawyerDashboardProfile(User $lawyer){
        $category = Category::find($lawyer->lawyer->category_id);

        return view('lawyer.dashboard-profile', compact('lawyer', 'category'));
    }
}

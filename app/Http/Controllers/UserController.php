<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReview;
use App\Http\Requests\UpdateLawyerInfo;
use App\Models\Category;
use App\Models\Lawyer;
use App\Models\User;
use Illuminate\Http\Request;
use Image;
use Session;
use File;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUserDashboard(User $user) {
        $category = null;
        if($user->role_id === 2) {
            $category = Category::find($user->lawyer->category_id);
        }

        return view('users.dashboard', compact('user', 'category'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUserSettings(User $user) {
        $categories = Category::all();

        return view('users.settings', compact('user', 'categories'));
    }

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

        Lawyer::updateOrCreate([
            'user_id' => \Auth::id()
        ], [
            'category_id' => $request->input('category_id'),
            'company' => $request->input('company'),
            'address' => $request->input('address'),
            'company_website' => $request->input('company_website'),
            'university' => $request->input('university'),
            'experience' => $request->input('experience'),
            'background' => $request->input('background'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
            'linkedin' => $request->input('linkedin')
        ]);

        Session::flash('success', 'You successfully updated your profile!');

        return back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUserMessages() {
        return view('users.messages');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUserBookings() {
        return view('users.bookings');
    }
}

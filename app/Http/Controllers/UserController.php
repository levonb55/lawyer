<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReview;
use App\Http\Requests\UpdateLawyerInfo;
use App\Models\Admin\Category;
use App\Models\Lawyer;
use App\Models\Publication;
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
        $publications = Publication::where('user_id', $user->id)->get();
        $collection = collect($user->lawyer->categories);
        $checkedCategories = $collection->pluck(['pivot'])->pluck('category_id');
        return view('users.settings', compact('user', 'categories', 'publications', 'checkedCategories'));
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

        $lawyer = Lawyer::updateOrCreate([
            'user_id' => \Auth::id()
        ], [
            'company' => $request->input('company'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'postcode' => $request->input('postcode'),
            'company_website' => $request->input('company_website'),
            'university' => $request->input('university'),
            'experience' => $request->input('experience'),
            'background' => $request->input('background'),
            'instagram' => $request->input('instagram'),
        ]);

        if ($lawyer->categories) {
            $lawyer->categories()->sync($request->input('category_id'));
        } else {
            $lawyer->categories()->sync($request->input('category_id'), false);
        }

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

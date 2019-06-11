<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReview;
use App\Models\Category;
use App\Models\Lawyer;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;

class LawyerController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user) {
        $category = Category::find($user->lawyer->category_id);

        $reviews = Review::where('lawyer_id',$user->id)
                    ->orderBy('created_at', 'DESC')
                    ->get();

        return view('lawyers.show', compact('user', 'category', 'reviews'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLawyersCategories() {
        $categories = Category::all();

        return view('categories.lawyers-categories', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLawyersByCategory() {
        return view('categories.lawyers-category');
    }

    /**
     * @param StoreReview $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeReviews(StoreReview $request, User $user) {

        Review::create([
            'client_id' => Auth::id(),
            'lawyer_id' => $user->id,
            'body' => $request->input('body'),
            'grade' => $request->input('grade'),
            'created_at' => date('Y-m-d G:i:s')
        ]);

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReview;
use App\Models\Category;
use App\Models\Lawyer;
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
        $reviews = DB::select('select body, grade, created_at from reviews where lawyer_id = :lawyer_id ORDER BY created_at DESC',
            ['lawyer_id' => $user->id]);

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

        DB::insert('insert into reviews (client_id, lawyer_id, body, grade, created_at) 
            values (:client_id, :lawyer_id, :body, :grade, :created_at)', [
            'client_id' => Auth::id(),
            'lawyer_id' => $user->id,
            'body' => $request->input('body'),
            'grade' => $request->input('grade'),
            'created_at' => date('Y-m-d G:i:s')
        ]);

        return back();
    }
}

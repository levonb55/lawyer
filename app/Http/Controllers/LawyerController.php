<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublication;
use App\Http\Requests\StoreReview;
use App\Models\Admin\Category;
use App\Models\Lawyer;
use App\Models\Publication;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Validator;

class LawyerController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user) {
        $category = Category::findOrFail($user->lawyer->category_id);

        $reviews = Review::where('lawyer_id',$user->id)
                    ->orderBy('id', 'DESC')
                    ->take(4)
                    ->get();

        $reviewsNumber = Review::where('lawyer_id',$user->id)->get()->count();
        $publications = Publication::where('user_id', $user->id)->get();

        return view('lawyers.show', compact('user', 'category', 'reviews', 'reviewsNumber', 'publications'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLawyersCategories() {
        $categories = Category::with('lawyers')->get();

        return view('categories.lawyers-categories', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLawyersByCategory(Category $category) {
        $lawyers = Lawyer::where('category_id', $category->id)->get();

        return view('categories.lawyers-category', compact('lawyers'));
    }

    public function searchLawyers(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:2|max:255'
        ]);

        $search = $request->input('search');
        return redirect()->route('lawyers.get-search', $search)->withInput();
    }

    public function getSearchedLawyers($search) {
        $lawyers = Lawyer::join('categories', 'lawyers.category_id', '=', 'categories.id')
            ->where('state', 'like', "%$search%")
            ->orWhere('city', 'like', "%$search%")
            ->orWhere('postcode', 'like',"%$search%")
            ->orWhere('categories.name', 'like', "%$search%")
            ->get();

        return view('categories.lawyers-category', compact('lawyers'));
    }
}

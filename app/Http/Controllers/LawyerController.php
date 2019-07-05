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
        $reviews = Review::where('lawyer_id',$user->id)
                    ->orderBy('id', 'DESC')
                    ->take(4)
                    ->get();

        $reviewsNumber = Review::where('lawyer_id',$user->id)->get()->count();
        $publications = Publication::where('user_id', $user->id)->get();
        return view('lawyers.show', compact('user','reviews', 'reviewsNumber', 'publications'));
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
        $lawyers = $category->lawyers->sortByDesc('rating');
        return view('categories.lawyers-category', compact('category', 'lawyers'));
    }

    public function searchLawyers(Request $request, Category $category)
    {
        $request->validate([
            'search' => 'required|string|min:2|max:255'
        ]);

        $search = $request->input('search');
        return redirect()->route('lawyers.get-search', ['category' => $category->id, 'search' => $search])->withInput();
    }

    public function getSearchedLawyers(Category $category, $search) {
        $lawyers = $category->lawyers()
            ->where(function ($query) use($search) {
                $query->where('state', 'like', "%$search%")
                    ->orWhere('city', 'like', "%$search%")
                    ->orWhere('postcode', 'like',"%$search%");
            })
            ->orderBy('rating', 'DESC')
            ->get();

        return view('categories.lawyers-category', compact('lawyers', 'category'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchLawyersByName(Request $request) {

        $name = $request->input('name');
        $city = $request->input('city');

        $request->validate([
            'name' => 'required|min:2|max:255',
            'city' => 'required|min:2|max:255'
        ]);


        $lawyers = User::join('lawyers', 'users.id', '=', 'lawyers.user_id')
                    ->where('lawyers.city', 'like', "%$city%")
                    ->where(function ($query) use($name) {
                        $query->where('users.first_name', 'like',  "%$name%")
                            ->orWhere('users.last_name', 'like', "%$name%")
                            ->orWhereRaw("concat(users.first_name, ' ', users.last_name) like '%$name%' ");
                    })
                    ->get();

        return view('categories.lawyers-search', ['lawyers' => $lawyers]);
    }

}

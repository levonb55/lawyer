<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublication;
use App\Http\Requests\StoreReview;
use App\Models\Category;
use App\Models\Lawyer;
use App\Models\Publication;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;

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

        $data = Review::create([
            'client_id' => Auth::id(),
            'lawyer_id' => $user->id,
            'body' => $request->input('body'),
            'grade' => $request->input('grade')
        ]);

        return response()->json([
            'body' => $data->body,
            'grade' => $data->grade,
            'created_at' => $data->created_at
        ]);

    }

    public function paginateReviews(User $user, $page) {

        $pageSkip = ($page * 4) - 4;
        $reviews = Review::where('lawyer_id',$user->id)
            ->skip($pageSkip)
            ->take(4)
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json($reviews);
    }

    public function storePublications(StorePublication $request,User $user) {

        $quant = count($request->title);

        for ($i = 0; $i < $quant; $i++) {
            if($request->publication[$i]) {
                $fileName = time(). $i . '.' . $request->publication[$i]->extension();
                $location = $request->publication[$i]->move(public_path('assets/publications/'), $fileName);
                chmod($location,0777);
            }

            Publication::create([
                'user_id' => \Auth::id(),
                'title' => $request->input('title')[$i],
                'publication' => $fileName
            ]);
        }

        Session::flash('success', 'You successfully edited your publications!');

        return back();
    }

    public function getPublication(Publication $publication){

        return view('lawyers.publication', compact('publication'));
    }
}

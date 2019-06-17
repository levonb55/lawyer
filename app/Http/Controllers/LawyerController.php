<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReview;
use App\Models\Category;
use App\Models\Lawyer;
use App\Models\Publication;
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
//                    ->orderBy('created_at', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->take(4)
                    ->get();

//        $reviews = $reviews->reverse();
        $reviewsNumber = Review::where('lawyer_id',$user->id)->get()->count();
//        dd($reviewsNumber);

        return view('lawyers.show', compact('user', 'category', 'reviews', 'reviewsNumber'));
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
            'grade' => $request->input('grade'),
//            'created_at' => date('Y-m-d G:i:s')
        ]);

//        return back();

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

//        dd($reviews);
//        dump($reviews);
//        return response()->json([
//            'name' => 'Abigail',
//            'state' => $page
//        ]);
        return response()->json($reviews);
//        return json_encode($reviews);
    }

    public function storePublications(Request $request,User $user) {
        $quant = count($request->title);

        for ($i = 0; $i < $quant; $i++) {
            if($request->publication['publication']) {
                $fileName = time() . '.' . $request->publication->extension();
                $location = $request->publication->move(public_path('assets/publications/'), $fileName);
                chmod($location,0777);
            }

            Publication::create([
                'user_id' => \Auth::id(),
//                'title' => $request->input('title'),
                'title' => $request->input('title')[$i],
//                'publication' => $fileName
                'publication' => 'hello file'
            ]);
        }

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReview;
use App\Models\Lawyer;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ReviewController extends Controller
{
    /**
     * @param StoreReview $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeReview(StoreReview $request, User $user) {

        $data = Review::create([
            'client_id' => Auth::id(),
            'lawyer_id' => $user->id,
            'body' => $request->input('body'),
            'grade' => $request->input('grade')
        ]);

        $lawyer = Lawyer::where('user_id',$user->id)->first();
        $lawyer->rating = ($lawyer->rating + $request->input('grade')) / 2;
        $lawyer->save();

        return response()->json([
            'body' => $data->body,
            'grade' => $data->grade,
            'created_at' => $data->created_at
        ]);

    }

    /**
     * @param User $user
     * @param $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginateReviews(User $user, $page) {

        $pageSkip = ($page * 4) - 4;
        $reviews = Review::where('lawyer_id',$user->id)
            ->skip($pageSkip)
            ->take(4)
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json($reviews);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Middleware\User;
use App\Http\Requests\StorePublication;
use App\Models\Publication;
use Illuminate\Http\Request;
use Session;
use File;

class PublicationController extends Controller
{
    /**
     * @param StorePublication $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * @param Publication $publication
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPublication(Publication $publication){

        return view('lawyers.publication', compact('publication'));
    }

    /**
     * @param Publication $publication
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePublication(Publication $publication){

        $oldImagePath = public_path('assets/publications/'. $publication->publication);
        File::delete($oldImagePath);
        $publication = Publication::destroy($publication->id);
        return response()->json($publication);

    }
}

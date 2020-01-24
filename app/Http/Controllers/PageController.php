<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\User;
use App\Models\Admin\Category;
use App\Models\Variable;
use Illuminate\Http\Request;

class PageController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $lawyers = Lawyer::take(3)->with('user')->with('categories')->with('reviews')
                        ->get();
        $categories = Category::limit(4)->get();

        return view('pages.index', compact('lawyers', 'categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact() {
        return view('pages.contact');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout() {
        $variableData = Variable::select('key', 'value')
            ->where('key', 'about-who-we-are-subheader')
            ->orWhere('key', 'about-who-we-are-text')
            ->orWhere('key', 'about-who-we-do-subheader')
            ->orWhere('key', 'about-what-we-do-text')
            ->orWhere('key', 'about-our-team-text')
            ->get();

        foreach($variableData as $data) {
            $variables[$data->key] = $data->value;
        }

        return view('pages.about', compact('variables'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTerms() {
        return view('pages.terms');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAffiliate() {
        return view('pages.affiliate');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAsk() {
        return view('pages.ask');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getWhyPage()
    {
        return view('pages.why');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPrivacy() {
        return view('pages.privacy');
    }
}

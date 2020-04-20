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
            ->where('key', 'about-who-we-are')
            ->orWhere('key', 'about-what-we-do')
            ->orWhere('key', 'about-our-team')
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
        $variableData = Variable::select('key', 'value')
            ->where('key', 'privacy-policy-header')
            ->orWhere('key', 'privacy-policy-text')
            ->get();

        foreach($variableData as $data) {
            $variables[$data->key] = $data->value;
        }

        return view('pages.privacy', compact('variables'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeNewsLetter;
use App\Mail\NewsSubscriberWelcome;
use App\Models\Lawyer;
use App\Models\NewsSubscriber;
use App\Models\User;
use App\Models\Admin\Category;
use App\Models\Variable;
use Illuminate\Http\Request;
use Mail;

class PageController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $lawyers = Lawyer::take(3)->with('user')->with('categories')->with('reviews')
                        ->get();
        $categories = Category::limit(4)->get();

        $variableData = Variable::select('key', 'value')
            ->where('key', 'home-slider-1')
            ->orWhere('key','home-slider-2')
            ->get();

        foreach($variableData as $data) {
            $variables[$data->key] = $data->value;
        }

        return view('pages.index', compact('lawyers', 'categories', 'variables'));
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
        $variableData = Variable::select('key', 'value')
            ->where('key', 'affiliate')
            ->get();

        foreach($variableData as $data) {
            $variables[$data->key] = $data->value;
        }

        return view('pages.affiliate', compact('variables'));
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
        $variableData = Variable::select('key', 'value')
            ->where('key', 'why-reach-legal')
            ->get();

        foreach($variableData as $data) {
            $variables[$data->key] = $data->value;
        }

        return view('pages.why', compact('variables'));
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

    public function subscribeToNewsLetter(SubscribeNewsLetter $request)
    {
        if($request->ajax()) {
            $validated = $request->validated();

            $subscriber = NewsSubscriber::create([
                'email' => $validated['email']
            ]);

            Mail::send(new NewsSubscriberWelcome($subscriber));

            return response()->json(['message' => 'You successfully subscribed to our newsletter.']);
        }
    }
}

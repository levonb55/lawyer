<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewsSubscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsSubscriberController extends Controller
{
    public function index()
    {
        $subscribers = NewsSubscriber::paginate(10);

        return view('admin.news-subscribers.index', compact('subscribers'));
    }

    public function destroy(NewsSubscriber $newsSubscriber)
    {
        $newsSubscriber->delete();

        return back()->with('delete', 'You removed a news subscriber!');
    }
}

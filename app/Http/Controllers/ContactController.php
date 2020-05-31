<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Variable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact as ContactRequest;
use Mail;

class ContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $variableData = Variable::select('key', 'value')
            ->where('key', 'phone')
            ->orWhere('key','email')
            ->orWhere('key','address')
            ->get();

        foreach($variableData as $data) {
            $variables[$data->key] = $data->value;
        }

        return view('contact.create', compact('variables'));
    }

    public function send(ContactRequest $request)
    {
        $data = $request->validated();

        Mail::send(new Contact($data));

        return back()->with('success', 'Your message was successfully sent!');
    }
}

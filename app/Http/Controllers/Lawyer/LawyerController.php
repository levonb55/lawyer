<?php

namespace App\Http\Controllers\Lawyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LawyerController extends Controller
{
    public function index(){
        return view('lawyer.dashboard');
    }
    public function messages(){
        return view('lawyer.chat');
    }
    public function calendar(){
        return view('lawyer.calendar');
    }
}

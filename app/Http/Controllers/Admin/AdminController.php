<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function getReferrals() {
        $users = User::select('first_name', 'last_name', 'referral')->where('role_id', 3)->get();
        return view('admin.pages.referrals', compact('users'));
    }
}

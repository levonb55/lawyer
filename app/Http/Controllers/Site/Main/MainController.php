<?php

namespace App\Http\Controllers\Site\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
  public function index(){
      return view('site.welcome');
  }
  public function about(){
      return view('site.about');
  }
  public function affiliate(){
        return view('site.affiliate');
  }
  public function lawyers(){
        return view('site.lawyers');
  }
  public function lawyersCategory(){
        return view('site.lawyers_category');
  }
  public function single(){
        return view('site.single');
  }
  public function privacy(){
        return view('site.privacy');
  }
  public function terms(){
        return view('site.terms');
  }
  public function lawyerProfile(){
        return view('site.profile');
  }
}

<?php

namespace App\Http\Controllers\publicview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('publicview.home');
    }

    public function aboutUs() {
        return view('publicview.aboutus');
    }
    public function contactUs() {
        return view('publicview.contact');
    }
}

<?php

namespace App\Http\Controllers\publicview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\District;
class HomeController extends Controller
{
    public function index()
    {
        $districts = District::pluck('name','id');
        return view('publicview.home',compact('districts'));
    }

    public function aboutUs() {
        return view('publicview.aboutus');
    }
    public function contactUs() {
        return view('publicview.contact');
    }
}

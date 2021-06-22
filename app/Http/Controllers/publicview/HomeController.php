<?php

namespace App\Http\Controllers\publicview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\District;
use App\Models\Case_type;
class HomeController extends Controller
{
    public function index()
    {
        $districts = District::pluck('name','id');
        $case_types = Case_type::pluck('case_type','id');
        return view('publicview.home',compact('districts','case_types'));
    }

    public function aboutUs() {
        return view('publicview.aboutus');
    }
    public function contactUs() {
        return view('publicview.contact');
    }
}

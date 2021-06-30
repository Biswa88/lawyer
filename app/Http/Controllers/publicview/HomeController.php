<?php

namespace App\Http\Controllers\publicview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\District;
use App\Models\Case_type;
use App\Models\User;
use App\Models\PublicView\Lawyer;

class HomeController extends Controller
{
    public function index()
    {
        $districts = District::pluck('name','id');
        $case_types = Case_type::pluck('case_type','id');

        //$top_rates_lawyers = User::where('role_id', 3)->orderBy('rating', 'DESC')->with('case_type')->limit(6)->get();
        
        $top_rates_lawyers = User::where('role_id', 3)
                            ->orderBy('rating', 'DESC')
                            ->with('district','case_types.caseType')
                            ->limit(6)
                            ->get();
        //dd($top_rates_lawyers);

        return view('publicview.home',compact('districts','case_types', 'top_rates_lawyers'));
    }

    public function aboutUs() {
        return view('publicview.aboutus');
    }
    public function contactUs() {
        return view('publicview.contact');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request)
    {
        if(isset($_GET['query']))
        {
            $search_text = $_GET['query'];
            $case_deals = DB::table('case_deals')->where('user_id','LiKE','%'.$search_text.'%')->paginate(2);
            $case_deals->appends($request->all());
            return view('search',['case_deals'=>$case_deals]);
        }
        else{
            return view('search');

        }
        
    }
}

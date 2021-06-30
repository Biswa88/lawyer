<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        
        //  if(Auth::user()->role->name=="client" ){
          
             
         

        if(Auth::user()->role->name=="admin"||Auth::user()->role->name=="lawyer" ){


             if(! Auth::user()->status):
                Auth::logout();
                 return view('user_disabled');

             endif;

            return redirect()->to('/dashboard');
        }
        return redirect()->route('user_profile');
    }
}

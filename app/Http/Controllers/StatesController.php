<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\State;
use Validator;
use Redirect;

class StatesController extends Controller
{
    public function create() {
        $states = State::pluck('name', 'id');
        return view('admin.master.state.create',compact('states'));
    }


    public function store(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data,State::$rules);
        if($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $state = State::create($data);
        return redirect()->back()->with('message','State created');
    }
   
}

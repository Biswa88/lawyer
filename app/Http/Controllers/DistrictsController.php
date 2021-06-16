<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\State;
use App\Models\Master\District;
use Validator,Redirect;

class DistrictsController extends Controller
{
    public function create() {
        $state = State::whereStatus(1)->orderby('name')->get();
        return view('admin.master.district.create', compact('state'));
    }


    public function store(Request $request) {
        $data = $request->all(); //dump($data);
        $validator = Validator::make($data,District::$rules); //dd($validator);
        if($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $state = District::create($data);
    }
}

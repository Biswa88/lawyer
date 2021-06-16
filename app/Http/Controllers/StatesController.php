<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\State;
use Validator;
use Redirect;

class StatesController extends Controller
{
    public function create() {
        return view('admin.master.state.create');
    }


    public function store(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data,State::$rules);
        if($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $state = State::create($data);
    }
}

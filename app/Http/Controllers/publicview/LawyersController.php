<?php

namespace App\Http\Controllers\publicview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Case_type;
use Redirect, Validator;
use App\Models\PublicView\Lawyer;

class LawyersController extends Controller
{
    public function create()
    {
        $roles= Role::pluck('name', 'id');
        $case_types= Case_type::pluck('case_type', 'id');

        return view('publicview.lawyers.create',compact('roles','case_types'));
    }

    public function save(Request $request) {
        //  dd($request->all());

        $data = $request->all();

        if($request->password != $request->password_confirmation) {
            return Redirect::back()->with('message','Password Mismatch !')->withInput();
        }

        $data['password'] = bcrypt($request->password);

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = md5(time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data['image'] = 'images/'.$name;
        }

        //dd($data);

        $validator = Validator::make($data,Lawyer::$rules);
        if($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        if(Lawyer::create($data)) {
            return Redirect::route('login')->with('message','Registration Successfull !');
        }


    }
}

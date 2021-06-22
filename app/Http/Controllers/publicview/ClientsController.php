<?php

namespace App\Http\Controllers\publicview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Validator;
use App\Models\PublicView\Client;
use App\Models\Role;

class ClientsController extends Controller
{
    public function create()
    {
        $roles= Role::pluck('name', 'id');
        

        return view('publicview.clients.create',compact('roles'));
    }

    public function save(Request $request) {
        //  dd($request->all());

        $data = $request->all();
        //$data['image'] = $name;

        $data['role_id'] = 1;
        
        if($request->password != $request->password_confirmation) {
            return Redirect::back()->with('message','Password Mismatch !')->withInput();
        }

        $data['password'] = bcrypt($request->password);

        // $this->validate($request, [
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //  ]);
    
        //  if ($request->hasFile('image')) {

        //     $image = $request->file('image');
        //     $name = md5(time()).'.'.$image->getClientOriginalExtension();
        //    $destinationPath = public_path('/images');
        //     $image->move($destinationPath, $name);
        //     $data['image'] = 'images/'.$name;
      
        //  }
       


        //dd($data);

        $validator = Validator::make($data,Client::$rules);
        if($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        if(Client::create($data)) {
            return Redirect::route('login')->with('message','Registration Successfull !');
        }


    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\State;
use App\Models\Master\District;
use Validator,Redirect;

class DistrictsController extends Controller
{
    public function create() {
        $districts = District::pluck('name', 'id');
        $states = State::pluck('name', 'id');
        $state = State::whereStatus(1)->orderby('name')->get();
        return view('admin.master.district.create', compact('state','districts','states'));
    }


    public function store(Request $request) {
        $data = $request->all(); //dump($data);
        $validator = Validator::make($data,District::$rules); //dd($validator);
        if($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $state = District::create($data);
    }
    public function index()
    {
        $districts = District::get();
        return view('admin.master.district.index',compact('districts'));
    }
 public function show($id)
     {
       $districts1 = District::find($id);
        return view('admin.master.district.delete',compact('districts1'));
     }
     public function edit($id)
     {
         $districts2 = District::find($id);
         return view('admin.master.district.edit',compact('districts2'));
     }
     public function update(Request $request, $id)
     {
         $this->validate($request,[
           'name'=>'required'
       ]);
     $name = District::find($id);
         $name->name = $request->name;
        $name->save();
        return redirect()->route('admin.master.district.index')->with('message','District  updated');
     }

    
     
     public function destroy($id)
     {
         $name = District::find($id);
         $name->delete();
         return redirect()->route('admin.master.district.index')->with('message','District deleted');
     }
}




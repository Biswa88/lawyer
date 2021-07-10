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
        $this->validate($request,[
            'name'=>'required'

        ]);
        District::create($request->all());
        return redirect()->back()->with('message','District created');
    }
    public function index()
    {
        $districts = District::get();
        return view('admin.master.district.index',compact('districts'));
    }
  public function show($id)
     {
        $name = District::find($id);
        return view('admin.master.district.delete',compact('name'));
     }
  public function edit($id)
     {
        $district = District::find($id);
        return view('admin.master.district.edit',compact('district'));
        
      }
     public function update(Request $request, $id)
     {
         $this->validate($request,[
           'name'=>'required'
       ]);
            $district = District::find($id); 
            $district->name = $request->name;
            $district->save();
            
        return redirect()->route('district.index')->with('message','District  updated');
     }

    
     
     public function destroy($id)
     {
         $name = District::find($id);
         $name->delete();
         return redirect()->route('district.index')->with('message','District deleted');
     }
}



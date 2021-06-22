<?php

namespace App\Http\Controllers\publicview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Case_type;
use App\Models\Master\District;
use Redirect, Validator;
use App\Models\PublicView\Lawyer;

class LawyersController extends Controller
{
    public function create()
    {
        $roles= Role::pluck('name', 'id');
        $case_types= Case_type::pluck('case_type', 'id');
        $districts= District::pluck('name', 'id');

        return view('publicview.lawyers.create',compact('roles','case_types','districts'));
    }

    public function save(Request $request) {
        //  dd($request->all());

        $data = $request->all();
        $data['image'] = $name;

        $data['role_id'] = 3;
        
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


                                         
                                            

    public function search(Request $request)
    {
        //dd($request->all());

        $where = [];


        $where['role_id'] = 3;


        if($request->district_id) {
            $where['district_id'] = $request->district_id;
        }

        if($request->case_type) {
            $where['case_type'] = $request->case_type;
        }

        $data = Lawyer::where($where);

        if($request->q) {
            $data = $data->where('name', 'LIKE', '%'.$request->q.'%');
        }

        if($request->cfes) {
            $data = $data->where('consultancy_fees', '<=', $request->cfes);   
        }

        $results = $data->with('district','caseType')->paginate(2)->appends(request()->query());

        
        return view('publicview.lawyers.lawyer_search_result', compact('results'));
    }
}

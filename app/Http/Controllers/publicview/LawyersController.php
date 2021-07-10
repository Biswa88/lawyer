<?php

namespace App\Http\Controllers\publicview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

use App\Models\Case_type;
use App\Models\Master\District;
use Redirect, Validator, DB;
use App\Models\PublicView\Lawyer;
use App\Models\UserCaseType;
use App\Models\User;


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
        if(!isset($request->tnc) && !$request->tnc == 1) {
            return Redirect::back()->with('message','Please agree to our terms and conditions')->withInput();
        }

        $data = $request->all();
        //$data['image'] = $name;

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
       

        $validator = Validator::make($data,Lawyer::$rules);
        if($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        DB::beginTransaction();

        if($user = Lawyer::create($data)) {
            //insert case types
            if(count($request->case_types)) {
                for($i = 0; $i < count($request->case_types); $i++) {
                    $data = [];
                    $data['user_id'] = $user->id;
                    $case_type_id = $request->case_types[$i];

                    $data['case_type_id'] = $case_type_id;
                    

                    $validator = Validator::make($data,UserCaseType::$rules);
                    if($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

                    UserCaseType::create($data);
                }
            }
        }

        DB::commit();

        return Redirect::route('login')->with('message','Registration Successfull !');


    }


                                         
                                            

    public function search(Request $request)
    {
        //dd($request->all());

        $where = [];


        $where['role_id'] = 3;
        $where['status'] = 1;


        if($request->district_id) {
            $where['district_id'] = $request->district_id;
        }

        

        if($request->lawyer_id) {
            $where['id'] = $request->lawyer_id;
        }

        $data = User::where($where);

        if($request->q) {
            $data = $data->where('name', 'LIKE', '%'.$request->q.'%');
        }

        if($request->cfes) {
            $data = $data->where('consultancy_fees', '<=', $request->cfes);   
        }


        if($request->case_type) {
            $case_type_users = UserCaseType::where('case_type_id', $request->case_type)->where('status', 1)->get();
            $case_type_users_arr = [];

            foreach($case_type_users as $k => $v) {
                $case_type_users_arr[] = $v->user_id;
            }
            $data = $data->whereIn('id', $case_type_users_arr);
        }



        $results = $data
                        ->with('district','case_types.caseType')
                        ->paginate(10)
                        ->appends(request()->query());

        //dd($results);
        
        return view('publicview.lawyers.lawyer_search_result', compact('results'));
    }
}

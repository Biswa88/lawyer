<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Booking;

use App\Models\Case_type;
use Auth,Validator;
use App\Models\Rating;
use App\Models\UserCaseType;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(\Auth::user()->role->name);
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->with('case_types.caseType')->first();
        return view('admin.lawyer.index',compact('user'));

    }
    public function index1()
    {
      
         $users  = User::where('role_id','=',3)->get();
         return view('admin.lawyer.index1',compact('users'));

    }
    public function index2()
    {
        $users  = User::where('role_id','=',1)->get();
        return view('admin.lawyer.index2',compact('users'));

    }
    public function view_all_appointments()
    {
        //dd('ddd');
         
        
        $all_bookings =Booking::where('lawyer_id', Auth::user()->id)->with('lawyer', 'user')->paginate(10);
       
        
        return view('admin.lawyer.view_lawyers_appointments',compact('all_bookings'));
       
       
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::pluck('name', 'id');
        $case_type = Case_type::pluck('case_type', 'id');
        $already_added_case_types = [];

        return view('admin.lawyer.create', compact('case_type', 'roles', 'already_added_case_types'));
    }
    public function deactivate_lawyer()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->status = 0;
        $user->save();

        Auth::logout();
        return redirect('/login')->with(['messgae' => 'User Deactivated !']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        $name = (new User)->userAvatar($request);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message','Lawyer added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(Auth::user()->id);
        if(!$user) return 'User not found !';

        return view('admin.lawyer.delete',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $roles = Role::pluck('name', 'id');
        $case_types = Case_type::pluck('case_type', 'id');

        $already_added_case_types_data = UserCaseType::where('user_id', $id)->select('case_type_id')->get();

        foreach($already_added_case_types_data as $v) {
            $already_added_case_types[] = $v->case_type_id;
        }

        //dd($already_added_case_types);

        return view('admin.lawyer.edit',compact('user','roles','case_types', 'already_added_case_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd('ddddd');
        $this->validateUpdate($request,$id);
        $data = $request->all();
        $user = User::find($id);

        if(count($request->case_types)) {

            //remove previous data
            $already_added_case_types = UserCaseType::where('user_id', $id)->get();

            foreach($already_added_case_types as $k1 => $v1) {
                $uct = UserCaseType::find($v1->id);

                $uct->delete();
            }

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

        $imageName = $user->image;
        $userPassword = $user->password;
        if($request->hasFile('image')){
            $imageName =(new User)->userAvatar($request);
            unlink(public_path('images/'.$user->image));
        }
        $data['image'] = $imageName;
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $userPassword;
        }
         $user->update($data);
        return redirect()->route('lawyer.index')->with('message','Lawyer updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(auth()->user()->id == $id){
           abort(401);
     }
        $user = User::find($id);
      $userDelete = $user->delete();
       if($userDelete){
        unlink(public_path('images/'.$user->image));
       }
        return redirect()->route('lawyer.index')->with('message','Lawyer deleted successfully');

    }

    
    public function validateStore($request)
    {
       return $this->validate($request,[
            'name'=>'required',
            
            'email'=>'required|unique:users',
            'password'=>'required|min:6|max:18',
            'bcr'=>'required',
           'address'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
            'role_id'=>'required',
            'description'=>'required',
            'case_type'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'district_id'=>'required',
            'consultancy_fees'=>'required'

        ]);
    }
    public function validateUpdate($request,$id){
        return  $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
          
            'bcr'=>'required',
            
            'address'=>'required',
            
            
            'image'=>'mimes:jpeg,jpg,png',
            'role_id'=>'required',
            'description'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'district_id'=>'required',
            'consultancy_fees'=>'required'

       ]);
    }


    public function submitRating(Request $request) {
        $user_id = Auth::user()->id;
        $lawyer_id = $request->lawyer_id;
        $booking_id = $request->booking_id;
        $rating = $request->rating;
        $completion_status = $request->completion_status;

        $data = [];

        $data['user_id'] = $user_id;
        $data['lawyer_id'] = $lawyer_id;
        $data['booking_id'] = $booking_id;
        $data['rating'] = $rating;
        $data['completion_status'] = $completion_status;

        $msg = [];

        $validator = Validator::make($data,Rating::$rules);

        if($validator->fails()) {
            $msg['error'] = 1;
            $msg['msg'] = 'Validation failed';

            return json_encode($msg);
        }

        if(Rating::create($data)) {

            //save ratng in Users table

            $lawyer_user_info = User::find($lawyer_id);
            $all_rating_obj = Rating::where('lawyer_id', $lawyer_id)->select('rating');

            $avg_rating = ($all_rating_obj->sum('rating')/$all_rating_obj->count());
            $lawyer_user_info->rating = round($avg_rating, 2);
            $lawyer_user_info->save();

            $msg['error'] = 0;
            $msg['msg'] = 'You have rated your lawer successfully';

            return json_encode($msg);
        }

        $msg['error'] = 1;
        $msg['msg'] = 'Something went wrong !';

        return json_encode($msg);

    }
   
}

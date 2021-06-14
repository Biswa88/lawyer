<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $users  = User::where('role_id','!=',1)->get();
        return view('admin.lawyer.index',compact('users'));

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lawyer.create');
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
        $user = User::find($id);
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
        return view('admin.lawyer.edit',compact('user'));
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
        $this->validateUpdate($request,$id);
        $data = $request->all();
        $user = User::find($id);
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
            'case_deal'=>'required',
            'gender'=>'required',
            'phone'=>'required'
            

        ]);
    }
    public function validateUpdate($request,$id){
        return  $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
          
            'bcr'=>'required',
            
            'address'=>'required',
            'case_deal'=>'required',
            
            
            'image'=>'mimes:jpeg,jpg,png',
            'role_id'=>'required',
            'description'=>'required',
            'gender'=>'required',
            'phone'=>'required'

       ]);
    }
   
}

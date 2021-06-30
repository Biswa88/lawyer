<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Case_type;

class Case_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $case_types = Case_type::get();
        return view('admin.case_type.index',compact('case_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.case_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'case_type'=>'required'

        ]);
        Case_type::create($request->all());
        return redirect()->back()->with('message','Case_type created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $case_type = Case_type::find($id);
        return view('admin.case_type.delete',compact('case_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $case_deal = Case_type::find($id);
        return view('admin.case_type.edit',compact('case_deal'));
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
        $this->validate($request,[
            'case_type'=>'required'
        ]);
        $case_type = Case_type::find($id);
        $case_type->case_type = $request->case_type;
        $case_type->save();
        return redirect()->route('case_type.index')->with('message','Case_type Created updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $case_type = Case_type::find($id);
        $case_type->delete();
        return redirect()->route('case_type.index')->with('message','Case_type deleted');
    }
}

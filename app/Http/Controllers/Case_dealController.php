<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Case_deal;

class Case_dealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $case_deals = Case_deal::get();
        return view('admin.case_deal.index',compact('case_deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.case_deal.create');
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
            'case_deal'=>'required'

        ]);
        Case_deal::create($request->all());
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
        $case_deal = Case_deal::find($id);
        return view('admin.case_deal.delete',compact('case_deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $case_deal = Case_deal::find($id);
        return view('admin.case_deal.edit',compact('case_deal'));
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
            'case_deal'=>'required'
        ]);
        $case_deal = Case_deal::find($id);
        $case_deal->case_deal = $request->case_deal;
        $case_deal->save();
        return redirect()->route('case_deal.index')->with('message','Case_type Created updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $case_deal = Case_deal::find($id);
        $case_deal->delete();
        return redirect()->route('case_deal.index')->with('message','Case_type deleted');
    }
}

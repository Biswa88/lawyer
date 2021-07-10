<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AppointmentComission;
use App\Models\User;

class ReportsController extends Controller
{
 public function CommisonReport(Request $request)
 {
    $lawyer_id = null;
    if($request->user_id) {
        $lawyer_id = $request->user_id;
    }
    $lawyers = User::where('status',1)->where('role_id', 3)->pluck('name', 'id');
    $results = AppointmentComission::with('payment')->get();

    return view('admin.reports.commission', compact('results', 'lawyers', 'lawyer_id'));
 }
 
}

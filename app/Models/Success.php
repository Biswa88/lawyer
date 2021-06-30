<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Success extends Model
{
    use HasFactory;
    protected $fillable = [
        'lawyer_id',
        'case_type_id',
    
        'year',
        'status',
    ];

    public static $rules = [
        
        'lawyer_id' => 'required|exists:users,id',
        'case_type_id'   => 'required|exists:case_types,id',
        'year' => 'required',
        'status' => 'required',
    ];
}

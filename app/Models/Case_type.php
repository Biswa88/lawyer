<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Case_type extends Model
{
    protected $fillable = [
        'case_type',
    ];

    public static $rules = [
        'case_type' => 'required|min:2|max:128' 
     ];
}

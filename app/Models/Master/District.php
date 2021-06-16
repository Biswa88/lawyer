<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name',
        'state_id',
    ];
    public static $rules = [
        'name' => 'required|min:3|max:128',
        'state_id'=>'required|exists:states,id', 
    ];

}

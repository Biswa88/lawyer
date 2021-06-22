<?php

namespace App\Models\PublicView;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        
        'password',
        'email',
        'role_id',
        
        
        'gender',
        'phone',


        
    ];

    public static $rules = [
        'name' => 'required',
       
        'email' => 'required|email',
        'role_id' => 'required',
        'phone' => 'required|numeric',
        
        
        'gender' => 'required',
        
    ];

    
}

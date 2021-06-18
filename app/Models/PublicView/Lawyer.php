<?php

namespace App\Models\PublicView;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'bcr',
        'password',
        'email',
        'role_id',
        'phone',
        'address',
        'description',
        'image',
        'case_type',
        'gender',
    ];

    public static $rules = [
        'name' => 'required',
        'bcr'  => 'required|unique:users,bcr',
        'email' => 'required|email',
        'role_id' => 'required',
        'phone' => 'required|numeric',
        'address' => 'required',
        'description' => 'required',
        'image' => 'required',
        'case_type' => 'required',
        'gender' => 'required'
    ];
}

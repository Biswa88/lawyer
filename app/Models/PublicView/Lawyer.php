<?php

namespace App\Models\PublicView;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Master\District;
use App\Models\Case_type;
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
        'gender',
        'consultancy_fees',
        'district_id',
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
        'gender' => 'required',
        'consultancy_fees'=>'required',
        'district_id'=>'required'
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function case_types()
     {
         return $this->hasMany('App\Models\UserCaseType', 'case_type_id', 'id');
     }
}

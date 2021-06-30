<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'address',
        'bcr',
        'image',
        'case_type',
        'gender',
        'phone',
        'description',
        
         'district_id',
          'consultancy_fees',


    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
        return $this->hasOne('App\Models\Role','id','role_id');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\Master\District', 'district_id');
    }

    public function case_types()
     {
         return $this->hasMany('App\Models\UserCaseType');
     }
     public function userAvatar($request){
         $image = $request->file('image');
        $name = $image->hashName();
         $destination = public_path('/images');
        $image->move($destination,$name);
        return $name;

     }

     
}

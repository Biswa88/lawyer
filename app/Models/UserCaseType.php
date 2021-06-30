<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCaseType extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'case_type_id',
    ];

    public static $rules = [
        'user_id'   => 'required|exists:users,id',
        'case_type_id' => 'required|exists:case_types,id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
     public function caseType()
    {
        return $this->belongsTo(Case_type::class, 'case_type_id');
    }

}

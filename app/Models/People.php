<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $fillable = ['fullname','cui','address','phone','email','birthday','type_people_id'];

    public function type_people(){
        return $this->belongsTo('App\Models\TypePeople');
    }
    public function student_peoples(){
        return $this->hasMany('App\Model\StudentPeople');
    }
}

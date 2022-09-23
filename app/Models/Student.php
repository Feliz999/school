<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['code','fullname','phone','birthday','cui','address','email','picture_student','description'];

    public function student_peoples(){
        return $this->hasMany('App\Models\StudentPeople');
    }

    public function student_homeworks(){
        return $this->hasMany('App\Models\StudentHomework');
    }
}

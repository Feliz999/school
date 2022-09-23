<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['code','fullname','phone','birthday','cui','address','email','picture_teacher','description'];

    public function level_sections(){
        return $this->hasMany('App\Models\LevelSection');
    }

    public function student_homeworks(){
        return $this->hasMany('App\Models\StudentHomework');
    }
}

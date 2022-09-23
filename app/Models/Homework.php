<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    protected $fillable = ['name','points','description','type_homework_id'];

    public function type_homework(){
        return $this->belongsTo('App\Models\TypeHomework');
    }

    public function student_homeworks(){
        return $this->hasMany('App\Models\StudentHomework');
    }
}

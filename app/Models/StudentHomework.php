<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHomework extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','homework_id','class_id','teacher_id','level_section_id'];

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }
    public function homework(){
        return $this->belongsTo('App\Models\Homework');
    }

    public function class(){
        return $this->belongsTo('App\Models\Class');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }
    public function level_section(){
        return $this->belongsTo('App\Models\LevelSection');
    }
}

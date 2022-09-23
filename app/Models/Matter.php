<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    use HasFactory;

    protected $fillable=['name','description'];

    public function level_sections(){
        return $this->hasMany('App\Models\LevelSection');
    }

    public function student_homeworks(){
        return $this->hasMany('App\Models\StudentHomework');
    }
}

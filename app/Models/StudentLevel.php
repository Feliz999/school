<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLevel extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','level_section_id'];

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }
    public function level_section(){
        return $this->belongsTo('App\Models\LevelSection');
    }
}

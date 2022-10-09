<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPeople extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','people_id'];

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }
    public function people(){
        return $this->belongsTo('App\Models\People');
    }
}

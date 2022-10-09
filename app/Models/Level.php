<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable=['name','number_id','description'];

    public function level_sections(){
        return $this->hasMany('App\Models\LevelSection');
    }

    public function levels(){
        return $this->hasMany('App\Models\Level');
    }
    public function number(){
        return $this->belongsTo('App\Models\Number');
    }
}

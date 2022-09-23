<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $fillable=['ciclo','description'];
    use HasFactory;

    public function level_sections(){
        return $this->hasMany('App\Models\LevelSection');
    }
}

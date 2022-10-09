<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelSection extends Model
{
    use HasFactory;
    protected $fillable = ['level_id','section_id','matter_id','cicle_id','teacher_id','period_id','description'];

    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    public function section(){
        return $this->belongsTo('App\Models\Section');
    }
    public function matter(){
        return $this->belongsTo('App\Models\Matter');
    }
    public function cicle(){
        return $this->belongsTo('App\Models\Cicle');
    }
    public function teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }
    public function period(){
        return $this->belongsTo('App\Models\Period');
    }
}

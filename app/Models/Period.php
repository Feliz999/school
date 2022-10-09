<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    protected $fillable = ['period','number_id','description'];

    public function number(){
        return $this->belongsTo('App\Models\Number');
    }
}

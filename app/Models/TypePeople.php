<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePeople extends Model
{
    protected $table = 'type_people';
    protected $fillable = ['name','description'];

    public function people(){
        return $this->hasMany('App/Models/People');
    }
    use HasFactory;
}

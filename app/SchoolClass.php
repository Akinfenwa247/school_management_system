<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = ['name'];
    /*public function products()
    {
        return $this->hasMany(Teacher::class);
    }*/
}

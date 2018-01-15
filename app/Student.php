<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'surname', 'middle_name', 'sex', 'dob', 'address', 'school_classes', 'nationality', 'SOO', 'LGOO', 'image'];
}

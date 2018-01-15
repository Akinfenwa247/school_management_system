<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name','user_id', 'description', 'startdate','enddate','starttime','endtime','color','url' ];
}

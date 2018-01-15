<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;


class Teacher extends Model
{
    protected $fillable = ['name','status', 'birthday', 'phone', 'gender', 'qualification', 'address', 'image', 'class_id' ];
    /*public function schoolClass(){
        $this->belongsTo(SchoolClass::class);
    }*/
}

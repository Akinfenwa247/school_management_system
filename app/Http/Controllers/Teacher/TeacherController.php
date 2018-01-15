<?php

namespace App\Http\Controllers\Teacher;

use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class TeacherController extends Controller
{
    public function index()
    {
        $user= Auth::user()->teacher_id;
        $teacher= Teacher::where('id', '=', $user);
        $name =$teacher->value('name') ;
        $class = $teacher->value('class_id');
        $image= $teacher->value('image');
        //$name = Teacher::select();
        //$name= Teacher::where('id','=', $user)->get();
        return view('teacher.dashboard.index', compact('names','user','class','teacher', 'image', 'name'));
    }
}

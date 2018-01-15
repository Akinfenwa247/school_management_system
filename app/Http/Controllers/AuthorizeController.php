<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AuthorizeController extends Controller
{

    public function create(Request $data)
    {

      User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'role_id'=>$data['role_id'],
            'teacher_id'=>$data['teacher_id'],
            'password' => bcrypt($data['password']),
        ]);
        return redirect()->route('teachers.index');
    }
}

<?php

namespace App\Http\Controllers\Parent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentsController extends Controller
{

    public function index()
    {
        return view('parent.dashboard.index');
    }

}

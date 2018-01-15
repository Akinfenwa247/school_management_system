<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $tasks= Task::all();
        return view('admin.dashboard.index', compact('tasks'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\SchoolClass;
use App\Teacher;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTeachersRequest;
use App\Http\Requests\Admin\UpdateTeachersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class TeachersController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Teacher.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classChange= SchoolClass::pluck('name','id');
        $classes = SchoolClass::all();
        $teachers = Teacher::where('status', '=', 1)->orderBy('id', 'desc')->get();
        return view('admin.teachers.index', compact('teachers','classes','classChange'));

    }

    /**
     * Show the form for creating new Teacher.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created Teacher in storage.
     *
     * @param  \App\Http\Requests\StoreTeachersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('image');

//        image upload
        $image = $request->image;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
        }

        Teacher::create($formInput);
        return redirect()->route('teachers.index');
    }


    /**
     * Show the form for editing Teacher.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $teacher = Teacher::findOrFail($id);

        return view('admin.teachers.edit', compact('teacher'));
    }


    public function update(Request $request, $id)
    {
        $formInput = $request->except('image');

//        image upload
        $image = $request->image;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
        }
        $teacher = Teacher::findOrFail($id);
        $teacher->update($formInput);
        return redirect()->route('teachers.index');
    }


    /**
     * Display Teacher.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $teacher = Teacher::findOrFail($id);

        return view('admin.teachers.show', compact('teacher'));
    }


    /**
     * Remove Teacher from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->forceDelete();
        return redirect()->route('teachers.index');
    }

    public function delete( Request $request, $id )
    {
        $status = $request->input('status');
        DB::update('update teachers set status = ? where id = ?',[$status,$id]);
        return redirect()->route('teachers.index');
    }


}
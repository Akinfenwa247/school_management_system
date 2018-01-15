<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Local_government;
use App\SchoolClass;
use App\State;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students= Student::all();
        return view('admin.student.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes= SchoolClass::all();
        $user= Auth::user()->id;
        $countries= Country::all();
        $states= State::all();
        $LGAs= Local_government::all();
        return view('admin.student.create', compact('states','LGAs','countries', 'classes'));
    }

    public function view()
    {
        return abort(401);/*
        return Country::all();*/
    }
    public function login(Request $request){


        if($request->has('email') && $request->has('password')){
            $email = $request->input('email');
            $password = $request->input('password');

            //do authentication here
            /*if(User::where('email', $email)->where('password',$password)->get()){
                $response['success'] = 1;
                return json_encode($response);
            }*/
            if(true){

                $response['success'] = 1;
                return response()->json($response, 200);
            }
            else{
                $response['success'] = 0;
                $response['message'] = 'Invalid Email or Password';
                return response()->json($response, 200);
            }
        }
        else{
            $response['message'] = 'No parameter supplied';
            return response()->json($response, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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

        Student::create($formInput);
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

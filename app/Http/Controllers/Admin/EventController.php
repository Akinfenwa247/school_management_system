<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Auth::user()->id;
        $events= Event::where('user_id', '=', $user)->get();
        return view('admin.events.index', compact('events','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= Auth::user()->id;
        Event::create([
            'user_id'=>$user,
            'name'=>$request['name'],
            'startdate'=>$request['startdate'],
            'enddate'=>$request['enddate'],
            'starttime'=>$request['starttime'],
            'endtime'=>$request['endtime'],
            'color'=>$request['color'],
            'description'=>$request['description'],
            'url'=>$request['url'],
        ]);
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$user= Auth::user()->id;
        return Event::where('user_id', '=', $user)->get();*/
    }
    public function view()
    {
        $user= Auth::user()->id;
        $result= Event::where('user_id', '=', $user)->get();
            return response()->json(['monthly'=>$result]);

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
        $teacher = Event::findOrFail($id);
        $teacher->forceDelete();
        return redirect()->route('events.index');
    }
}

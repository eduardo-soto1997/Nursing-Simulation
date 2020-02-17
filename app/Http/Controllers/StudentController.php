<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['Students'] = Students::all();

        return view('manage_student', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add_student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request ->input());
        $ObjStudent = new Students();
        $ObjStudent ->firstname = $request->input('firstname');
        $ObjStudent ->lastname = $request->input('lastname');
        $ObjStudent ->class = $request->input('class');
        $ObjStudent ->section = $request->input('section');


        $ObjStudent-> save();

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data['Students'] = Students::find($id);

        return view('add_student', $data);
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
        $ObjStudent = Students::find($id);

        $ObjStudent->firstname = $request->input('firstname');
        $ObjStudent->lastname = $request->input('lastname');
        $ObjStudent ->class = $request->input('class');
        $ObjStudent ->section = $request->input('section');

        $ObjStudent->save();

        return redirect()->route('students.index');
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
        $ObjStudent = Students::find($id);
        $ObjStudent->delete();

        return redirect()->route('students.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Classes;

class ClassesController extends Controller
{
  public function show($slug){
      $classes = Classes::where('id', $slug)->firstOrFail();
      return view('manage_classes', [
        'classes' => $classes
      ]);
  }
  public function index(){
      $classes = Classes::all();
      return view('class.index', [
        'classes' => $classes
      ]);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //view for create
        return view('class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
          'class_name' => 'required|max:255',
          'course_number' => 'required|max:255',
          'section' => 'required|numeric',
          'instructor' => 'required|max:255',
      ]);
      $show = Classes::create($validatedData);

      return redirect('/classes')->with('success', 'Classes is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $classes = Classes::findOrFail($id);

      return view('class.edit', compact('classes'));
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
      $validatedData = $request->validate([
        'class_name' => 'required|max:255',
        'course_number' => 'required|max:255',
        'section' => 'required|numeric',
        'instructor' => 'required|max:255',
      ]);
      Classes::whereId($id)->update($validatedData);

      return redirect('/classes')->with('success', 'Classes is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $classes = Classes::findOrFail($id);
      $classes->delete();

      return redirect('/classes')->with('success', 'Classes is successfully deleted');
    }
}

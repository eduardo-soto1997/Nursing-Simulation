<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Classes;

class ClassesController extends Controller
{
  public function show($slug){
      $users = User::all()->toArray();
      $classes = Classes::where('id', $slug)->firstOrFail();
      return view('manage_classes', [
        'classes' => $classes
      ]);
  }
  public function index(){
      $users['users'] = User::all()->toArray();
      $classes = Classes::all();
      return view('class.index', [
        'classes' => $classes
      ] , $users);
  }
    public function create()
    {
      //view for create
       $users['users'] = User::all()->toArray();
        return view('class.create', $users);
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
          'class_name' => 'required|max:255',
          'course_number' => 'required|max:255',
          'section' => 'required|numeric',
          'instructor' => 'required|max:255',
      ]);
      $classes = Classes::create($validatedData);

      return redirect('/classes')->with('success', 'Classes is successfully saved');
    }

    public function edit($id)
    {
      $classes = Classes::findOrFail($id);
      $users['users'] = User::all()->toArray();
      return view('class.edit', compact('classes'), $users);
    }

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
    public function destroy($id)
    {
      $classes = Classes::findOrFail($id);
      $classes->delete();

      return redirect('/classes')->with('success', 'Classes is successfully deleted');
    }
}

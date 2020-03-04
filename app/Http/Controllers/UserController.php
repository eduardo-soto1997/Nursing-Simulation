<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Classes;

class UserController extends Controller
{
    public function show($slug){
        $users = User::where('id', $slug)->firstOrFail();
        return view('manage_users', [
          'users' => $users
        ]);
    }

    public function index(){
        $users = User::all();
        return view('user.index', [
          'users' => $users
        ]);
    }

    public function destroy($id){
      $user = User::findOrFail($id);
      $user->delete();

        return redirect('/users')->with('success','User deleted successfully');
    }

    public function edit($id){
      $user = User::find($id);
      $classes = Classes::select('id', 'course_number', 'class_name', 'section')->get();
      return view('user.edit', [
        'user' => $user,
        'classes' => $classes
      ]);
    }

    public function create(){
      return view('user.create');
    }

    public function store(){
      dd(request()->all());
    }

    public function update($id){
      $user = User::find($id);
      $user->name = request('name');
      $user->email = request('email');
      $user->is_Admin = request('is_Admin');
      $user->classes_id = request('classes_id');

      $user->save();

      return redirect('/users');
    }

}

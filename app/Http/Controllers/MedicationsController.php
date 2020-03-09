<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\medication;

class MedicationsController extends Controller
{
  public function show($slug){
      $users = User::all()->toArray();
      $medication = medication::where('id', $slug)->firstOrFail();
      return view('manage_medications', [
        'medication' => $medication
      ]);
  }
  public function index(){
      $users['users'] = User::all()->toArray();
      $medication = medication::all();
      return view('medications.index', [
        'medication' => $medication
      ] , $users);
  }
    public function create()
    {
      //view for create
       $users['users'] = User::all()->toArray();
        return view('medications.create', $users);
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
          'medication' => 'required|max:255',
          'dosage' => 'required|max:255',
          'date_time_taken' => 'required|date',
          'reason' => 'required|max:255',
          'patient_id' => 'required|numeric',
      ]);
      $medication = medication::create($validatedData);

      return redirect('/medications')->with('success', 'medication is successfully saved');
    }

    public function edit($id)
    {
      $medication = medication::findOrFail($id);
      $users['users'] = User::all()->toArray();
      return view('medications.edit', compact('medication'), $users);
    }

    public function update(Request $request, $id)
    {
      $validatedData = $request->validate([
          'medication' => 'required|max:255',
          'dosage' => 'required|max:255',
          'date_time_taken' => 'required|date',
          'reason' => 'required|max:255',
          'patient_id' => 'required|numeric',
      ]);
      medication::whereId($id)->update($validatedData);

      return redirect('/medications')->with('success', 'medication is successfully updated');
    }
    public function destroy($id)
    {
      $medication = medication::findOrFail($id);
      $medication->delete();

      return redirect('/medications')->with('success', 'medication is successfully deleted');
    }
  }

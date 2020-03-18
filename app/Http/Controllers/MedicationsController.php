<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use App\medication;

class MedicationsController extends Controller
{
  public function show($slug){
    $patients['patients'] = patient::all()->toArray();
      $medication = medication::where('id', $slug)->firstOrFail();
      return view('manage_medications', [
        'medication' => $medication
      ]);
  }
  public function index(){
    $patients['patients'] = patient::all()->toArray();
      $medication = medication::all();
      return view('medications.index', [
        'medication' => $medication
      ] , $patients);
  }
    public function create()
    {
      //view for create
      $patients['patients'] = patient::all()->toArray();
        return view('medications.create', $patients);
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
      $patients['patients'] = patient::all()->toArray();
      return view('medications.edit', compact('medication'), $patients);
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

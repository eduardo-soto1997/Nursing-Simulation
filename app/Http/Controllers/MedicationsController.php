<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use App\medication;

class MedicationsController extends Controller
{
  public function show($slug){
      $patient = patient::findOrFail($slug);
      $medications = medication::all()->where('patient_id', $slug)->toArray();
      return view('medications.index', [
        'medications' => $medications,
        'patient' => $patient
      ]);
  }
  public function index(){
    $patients['patients'] = patient::all()->toArray();
      $medication = medication::all();
      return view('medications.index', [
        'medication' => $medication
      ] , $patients);
  }
    public function create($id)
    {
        $patient = patient::where('id', $id)->firstOrFail();
        return view('medications.create',
        [
          'patient' => $patient
        ]
       );
    }

    public function store(Request $request)
    {
      $pid = (int)($request['patient_id']);
      $patient = patient::where('id', $pid)->firstOrFail();
      $validatedData = $request->validate([
          'medication' => 'required|max:255',
          'dosage' => 'required|max:255',
          'date_time_taken' => 'required|date',
          'reason' => 'required|max:255',
          'patient_id' => 'required|numeric',
      ]);
      $medication = medication::create($validatedData);
      $medications = medication::all()->where('patient_id', $pid)->toArray();
      return view('medications.index',
      [
        'medications' => $medications,
        'patient' => $patient
      ]);
    }

    public function edit($id)
    {
      $medication = medication::findOrFail($id);
      $patient = patient::where('id', $medication->patient_id)->firstOrFail();
      return view('medications.edit', [
        'patient' => $patient,
        'medication' => $medication

       ]);
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
      $patient = patient::where('id', $request['patient_id'])->firstOrFail();
      $medications = medication::all()->where('patient_id', $request['patient_id'])->toArray();

      return view('medications.index',
      [
        'medications' => $medications,
        'patient' => $patient
      ]);
    }
    public function destroy($id)
    {
      $medication = medication::findOrFail($id);
      $pid = $medication->patient_id;
      $patient = patient::findOrFail($pid);
      $medication->delete();
      $medications = medication::all()->where('patient_id', $pid)->toArray();


      return view('medications.index', [
        'medications' => $medications,
        'patient' => $patient
      ]);
    }
  }

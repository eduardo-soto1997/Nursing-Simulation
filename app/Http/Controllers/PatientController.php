<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $patient = Patient::latest()->paginate(5);

      return view('patient.index',compact('patient'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('patient.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $request->validate([
          'name' => 'required',
          'mrn' => 'required',
          'admitting_diagnosis'=> 'required',
          'code_status'=> 'required',
          'primary_language'=> 'required',
          'social'=> 'required',
          'advanced_directives_on_file'=> 'required',
          'occupation'=> 'required',
          'cultural_considerations'=> 'required',
          'religious_practices'=> 'required',
          'sensory_communication_needs'=> 'required',
          'medical_history'=> 'required',
          'surgical_history'=> 'required',
          'date'=> 'required',
          'dob'=> 'required',
          'age'=> 'required',
          'admission_date'=> 'required',
          'allergies'=> 'required',
          'interpreter_required'=> 'required',
          'so_nok_poa'=> 'required'
      ]);

      Patient::create($request->all());

      return redirect()->route('patient.index')
                      ->with('success','Patient created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function show(patient $patient)
  {
      return view('patient.show',compact('patient'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function edit(patient $patient)
  {
      return view('patient.edit',compact('patient'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, patient $patient)
  {
      $request->validate([
          'name' => 'required',
          'detail' => 'required',
      ]);

      $patient->update($request->all());

      return redirect()->route('patient.index')
                      ->with('success','Patient updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function destroy(patient $patinet)
  {
      $patient->delete();

      return redirect()->route('patient.index')
                      ->with('success','Patient deleted successfully');
  }
}

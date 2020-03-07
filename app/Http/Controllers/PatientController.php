<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Dissease;

class PatientController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $patients = Patient::all();
    return view('patient.index', [
      'patients' => $patients
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $disseases = Dissease::all();
      return view('patient.add', ['disseases' => $disseases]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store()
  {
      $patient = new Patient();
      $patient->name = request('name');
      $patient->mrn = request('mrn');
      $patient->admitting_diagnosis = request('admitting_diagnosis');
      $patient->code_status = request('code_status');
      $patient->primary_language = request('primary_language');
      $patient->social = request('social');
      $patient->advanced_directives_on_file = request('advanced_directives_on_file');
      $patient->occupation = request('occupation');
      $patient->cultural_considerations = request('cultural_considerations');
      $patient->religious_practices = request('religious_practices');
      $patient->sensory_communication_needs = request('sensory_communication_needs');
      $patient->medical_history = request('medical_history');
      $patient->surgical_history = request('surgical_history');
      $patient->date = request('date');
      $patient->dob = request('dob');
      $patient->age = request('age');
      $patient->admission_date = request('admission_date');
      $patient->allergies = request('allergies');
      $patient->interpreter_required = request('interpreter_required');
      $patient->so_nok_poa = request('so_nok_poa');
      $patient->dissease_id = request('dissease');

      $patient->save();

      return redirect()->route('patient.index')
                      ->with('success','Patient created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function show(patient $patient)
  {
      $disseases = Dissease::all();

      return view('patient.show', [
        'patient' => $patient,
        'disseases' => $disseases,

      ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function edit($patient)
  {
    $disseases = Dissease::all();
<<<<<<< HEAD
      return view('patient.edit',compact('patient'), ['disseases' => $disseases]);
=======
    $patient = Patient::findOrFail($patient);
    return view('patient.edit', [
      'patient' => $patient,
      'disseases' => $disseases,

    ]);
>>>>>>> 8aafcbecc09e8131e3f981ef3d2f84db1237ec9e
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function update(patient $patient)
  {
    $patient->name = request('name');
    $patient->mrn = request('mrn');
    $patient->admitting_diagnosis = request('admitting_diagnosis');
    $patient->code_status = request('code_status');
    $patient->primary_language = request('primary_language');
    $patient->social = request('social');
    $patient->advanced_directives_on_file = request('advanced_directives_on_file');
    $patient->occupation = request('occupation');
    $patient->cultural_considerations = request('cultural_considerations');
    $patient->religious_practices = request('religious_practices');
    $patient->sensory_communication_needs = request('sensory_communication_needs');
    $patient->medical_history = request('medical_history');
    $patient->surgical_history = request('surgical_history');
    $patient->date = request('date');
    $patient->dob = request('dob');
    $patient->age = request('age');
    $patient->admission_date = request('admission_date');
    $patient->allergies = request('allergies');
    $patient->interpreter_required = request('interpreter_required');
    $patient->so_nok_poa = request('so_nok_poa');
    $patient->dissease_id = request('dissease');
    $patient->save();
      return redirect()->route('patient.index')
                      ->with('success','Patient updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $patient = Patient::findOrFail($id);
      $patient->delete();

      return redirect()->route('patient.index')
                      ->with('success','Patient deleted successfully');
  }
}

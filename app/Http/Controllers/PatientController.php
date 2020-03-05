<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

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
      return view('patient.add');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    dd($request);
      Patient::create($request->request->all());

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

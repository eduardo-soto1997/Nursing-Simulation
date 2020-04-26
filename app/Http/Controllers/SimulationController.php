<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questions;
use App\patient;
use App\medication;

class SimulationController extends Controller
{
  public function index(){
      $questions = questions::all();
      $patients = Patient::all()->where('id', '=', 3);
      return view('simulation.simulation', [
        'questions' => $questions,
        'patients'=> $patients
      ]);
  }

  public function show($id)
    {
        $patient = patient::find($id);
        $medications = medication::all()->where('patient_id', '=', $id);
        return view('simulation.patientInformation', ['patient' => $patient, 'medications' => $medications]);
    }
}

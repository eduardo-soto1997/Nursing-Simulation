<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questions;
use App\patient;

class SimulationController extends Controller
{
  public function index(){
      $questions = questions::all();
      $patients = patient::all();
      return view('simulation.simulation', [
        'questions' => $questions,
        'patients'=> $patients
      ]);
  }
}

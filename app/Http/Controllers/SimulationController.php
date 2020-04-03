<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questions;
use App\patient;

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
}

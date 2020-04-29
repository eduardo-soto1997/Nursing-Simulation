<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questions;
use App\patient;
use App\medication;
use App\possible_intervention;
use App\dissease;
use Illuminate\Support\Facades\Auth;

class SimulationController extends Controller
{
  public function index(){
      $patient = Patient::where('active', 1)->firstOrFail();
      $questions = questions::all()->where('patient_id', $patient->id);
      return view('simulation.simulation', [
        'questions' => $questions,
        'patients'=> $patient
      ]);
  }

  public function show($id)
    {
        $patient = patient::find($id);
        $medications = medication::all()->where('patient_id', '=', $id);
        return view('simulation.patientInformation', ['patient' => $patient, 'medications' => $medications]);
    }

  public function intervention(){
        $interventions = possible_intervention::all();
        $qids = str_getcsv(request('askedQuestions'));
        $questions = questions::findMany($qids)->toArray();
        $patient = patient::where('id', $questions[0]['patient_id'])->firstOrFail();
        $score = 100;
        foreach($questions as $question ){
          if($question['relevant'] == 0 && $score != 0){
            $score = $score - 10;
          }
        }
        $user = Auth::user();

        $user->score = $score;
        $user->patient_id = $questions[0]['patient_id'];
        $user->save();
        return view('simulation.intervention',[
          'interventions' => $interventions,
          'questions' => $questions,
          'patient' => $patient,
          'qids' => $qids
        ]);

  }

  public function score(){
      $qids = str_getcsv(request('questionsIDS'));
      $questions = questions::findMany($qids)->toArray();
      $user = Auth::user();
      $intervention = possible_intervention::where('id', request('intervention'))->firstOrFail();

      $patient = patient::where('id', $user->patient_id)->firstOrFail();
      if($patient->dissease->possible_intervention->id == request('intervention')){
        return view('simulation.correct',[
          'questions' => $questions,
          'intervention' => $intervention
        ]);
      }elseif($patient->dissease->possible_intervention->id != request('intervention')){
        return view('simulation.wrong', [
          'questions' => $questions,
          'intervention' => $intervention,
          'pIntervention' => $patient->dissease->possible_intervention
        ]);
      }


  }
}

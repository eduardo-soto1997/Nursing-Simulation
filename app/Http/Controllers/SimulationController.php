<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questions;
use App\patient;
use App\medication;
use App\possible_intervention;
use App\dissease;
use Illuminate\Support\Facades\Auth;
use App\scores;

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
        $userID = Auth::user()->id;
        $scoreDB = new Scores();
        $scoreDB->score = $score;
        $scoreDB->questions = request('askedQuestions');
        $scoreDB->user = $userID;
        $scoreDB->patient = $questions[0]['patient_id'];
        $scoreDB->intervention = possible_intervention::first()->id;
        $scoreDB->save();

        return view('simulation.intervention',[
          'interventions' => $interventions,
          'questions' => $questions,
          'patient' => $patient,
          'qids' => $qids
        ]);

  }

  public function score(){
      $qids = str_getcsv(request('questionsIDS'));
      $user = Auth::user();
      $scoreDB = scores::where('user', $user->id)->firstOrFail();
      $questions = questions::findMany($qids)->toArray();
      $intervention = possible_intervention::where('id', request('intervention'))->firstOrFail();
      $scoreDB->intervention = request('intervention');
      $patient = patient::where('id', $user->patient_id)->firstOrFail();
      if($patient->dissease->possible_intervention->id == request('intervention')){
        $scoreDB->save();
        return view('simulation.correct',[
          'questions' => $questions,
          'intervention' => $intervention
        ]);
      }elseif($patient->dissease->possible_intervention->id != request('intervention')){
        if($scoreDB->score >= 0){
          $scoreDB->score = $scoreDB->score - 20;
        }
        $scoreDB->save();
        return view('simulation.wrong', [
          'questions' => $questions,
          'intervention' => $intervention,
          'pIntervention' => $patient->dissease->possible_intervention
        ]);
      }


  }
}

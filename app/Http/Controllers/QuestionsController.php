<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questions;
use App\patient;

class QuestionsController extends Controller
{
  public function show($slug){
      $patient = patient::where('id', $slug)->firstOrFail();
      $questions = questions::all()->where('patient_id', $slug)->toArray();
      return view('questions.index', [
      'questions' => $questions,
      'patient' => $patient
      ]);
  }
  public function index(){
    $patients['patients'] = patient::all()->toArray();
      $questions = questions::all();
      return view('questions.index', [
        'questions' => $questions
      ], $patients);
  }
    public function create($slug)
    {
      //view for create
      $patient = patient::where('id', $slug)->firstOrFail();
        return view('questions.create', [
          'patient' => $patient
          ]);
    }

    public function store(Request $request)
    {
      $id = (int)($request['patient_id']);
      $patient = patient::where('id', $id)->firstOrFail();
      $validatedData = $request->validate([
        'patient_id' => 'required|max:255',
        'question' => 'required|max:255',
        'response' => 'required|max:255',
        'relevant' => 'required|boolean',
      ]);
      $questions = questions::create($validatedData);
      $questions_all = questions::all()->where('patient_id', $id)->toArray();
      return view('questions.index', [
      'questions' => $questions_all,
      'patient' => $patient
      ]);
    }

    public function edit($id)
    {
      $patients['patients'] = patient::all()->toArray();
      $questions = questions::findOrFail($id);
      return view('questions.edit', compact('questions') , $patients);
    }

    public function update(Request $request, $id)
    {//'patient_id','question','response','relevant'
      $validatedData = $request->validate([
        'patient_id' => 'required|max:255',
        'question' => 'required|max:255',
        'response' => 'required|max:255',
        'relevant' => 'required|boolean',
      ]);
      questions::whereId($id)->update($validatedData);
      $questions = questions::all()->where('patient_id', $request['patient_id'])->toArray();
      $patient = patient::whereId($request['patient_id'])->firstOrFail();
      return view('questions.index', [
      'questions' => $questions,
      'patient' => $patient
      ]);
    }
    public function destroy($id)
    {

      $question = questions::findOrFail($id);
      $question->delete();
      $qp_id = $question->patient_id;
      $questions = questions::all()->where('patient_id', $qp_id)->toArray();
      $patient = patient::where('id', $qp_id)->firstOrFail();
      return view('questions.index', [
      'questions' => $questions,
      'patient' => $patient
      ]);
    }
}

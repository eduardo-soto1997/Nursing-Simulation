<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questions;
use App\patient;

class QuestionsController extends Controller
{
  public function show($slug){
      $patients['patients'] = patient::all()->toArray();
      $questions = questions::where('id', $slug)->firstOrFail();
      return view('manage_questions', [
        'questions' => $questions
      ], $patients);
  }
  public function index(){
    $patients['patients'] = patient::all()->toArray();
      $questions = questions::all();
      return view('questions.index', [
        'questions' => $questions
      ], $patients);
  }
    public function create()
    {
      //view for create
      $patients['patients'] = patient::all()->toArray();
        return view('questions.create', $patients);
    }

    public function store(Request $request)
    {
      $patient = patient::findOrFail($request->only('patient_id'))->toArray();
      $validatedData = $request->validate([
        'patient_id' => 'required|max:255',
        'question' => 'required|max:255',
        'response' => 'required|max:255',
        'relevant' => 'required|boolean',
      ]);
      $questions = questions::create($validatedData);

      return view('questions.createWithId', [
        'patient' => $patient[0]
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

      return redirect('/questions')->with('success', 'questions is successfully updated');
    }
    public function destroy($id)
    {
      $questions = questions::findOrFail($id);
      $questions->delete();

      return redirect('/questions')->with('success', 'questions is successfully deleted');
    }
}

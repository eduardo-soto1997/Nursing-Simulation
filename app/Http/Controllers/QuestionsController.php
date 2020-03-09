<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\questions;

class QuestionsController extends Controller
{
  public function show($slug){
      $users = User::all()->toArray();
      $questions = questions::where('id', $slug)->firstOrFail();
      return view('manage_questions', [
        'questions' => $questions
      ]);
  }
  public function index(){
      $users['users'] = User::all()->toArray();
      $questions = questions::all();
      return view('questions.index', [
        'questions' => $questions
      ] , $users);
  }
    public function create()
    {
      //view for create
       $users['users'] = User::all()->toArray();
        return view('questions.create', $users);
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'patient_id' => 'required|max:255',
        'question' => 'required|max:255',
        'response' => 'required|max:255',
        'relevant' => 'required|boolean',
      ]);
      $questions = questions::create($validatedData);

      return redirect('/questions')->with('success', 'questions is successfully saved');
    }

    public function edit($id)
    {
      $questions = questions::findOrFail($id);
      $users['users'] = User::all()->toArray();
      return view('questions.edit', compact('questions'), $users);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\possible_intervention;

class Possible_InterventionsController extends Controller
{
  public function show($slug){
      $possible_interventions = possible_interventions::where('id', $slug)->firstOrFail();
      return view('manage_possible_interventions', [
        'possible_interventions' => $possible_interventions
      ]);
  }
  public function index(){
      $possible_interventions = possible_intervention::all();
      return view('possible_interventions.index', [
        'possible_interventions' => $possible_interventions
      ]);
  }
    public function create()
    {
      //view for create
       return view('possible_interventions.create');
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
          'intervention' => 'required|max:255',
        ]);
      $possible_interventions = possible_intervention::create($validatedData);

      return redirect('/possible_interventions')->with('success', 'possible_interventions is successfully saved');
    }

    public function edit($id)
    {
      $possible_interventions = possible_intervention::findOrFail($id);
      return view('possible_intervention.edit', compact('possible_interventions'));
    }

    public function update(Request $request, $id)
    {
      $validatedData = $request->validate([
          'intervention' => 'required|max:255',
        ]);
      possible_intervention::whereId($id)->update($validatedData);

      return redirect('/possible_interventions')->with('success', 'possible_interventions is successfully updated');
    }
    public function destroy($id)
    {
      $possible_interventions = possible_intervention::findOrFail($id);
      $possible_interventions->delete();

      return redirect('/possible_interventions')->with('success', 'possible_interventions is successfully deleted');
    }
}

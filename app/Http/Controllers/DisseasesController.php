<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dissease;
use App\possible_intervention;
class DisseasesController extends Controller
{
    public function index(){
      $disseases = Dissease::all();
      return view('dissease.index', [
        'disseases' => $disseases
      ]);
    }

    public function create(){
      $interventions = possible_intervention::all();
      return view('dissease.add', [
        'interventions' => $interventions
      ]);

    }

    public function show(){

    }

    public function edit($dissease){
      $interventions = possible_intervention::all();
      $dissease = Dissease::findOrFail($dissease);
      return view('dissease.edit', [
        'interventions' => $interventions,
        'dissease' => $dissease
      ]);
    }

    public function destroy($id){
      $dissease = Dissease::findOrFail($id);
      $dissease->delete();
      return redirect()->route('dissease.index')
                      ->with('success','Disease deleted successfully');

    }

    public function update($dissease){
      $dissease = Dissease::findOrFail($dissease);
      $dissease->disease = request('disease');
      $disease->possible_intervention_id = request('possible_intervention');
      $dissease->save();
      return redirect()->route('dissease.index')
                      ->with('success','Disease  updated successfully');

    }

    public function store(){
      $dissease = new Dissease();
      $dissease->disease = request('disease');
      $dissease->possible_intervention_id = request('possible_intervention');
      $dissease->save();
      $disseases = Dissease::all();
      return view('dissease.index',[
        'disseases' => $disseases
        ] );
    }
}

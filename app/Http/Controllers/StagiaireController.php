<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    //
    public function index(Request $request){
        $stagiaires = Stagiaire::orderBy('created_at', 'DESC')->with(['demandes', 'creater'])->paginate(5);

       return view('stagiaires.index', ['stagiaires' => $stagiaires]);
    }
    public function edit(Request $request, Stagiaire $stagiaire){
        return view('stagiaires.edit', ['stagiaire' => $stagiaire]);
    }
    public function update(Request $request, Stagiaire $stagiaire){

        $stagiaire->update($request->stagiaire);
        $stagiaires = Stagiaire::orderBy('created_at', 'DESC')->with(['demandes', 'creater'])->paginate(5);
        return redirect("stagiaires.index");

        // return view('stagiaires.index', ['stagiaires' => $stagiaires]);

     }
     public function deleteStagiaire(Stagiaire $stagiaire){

        $stagiaire->delete();

        return redirect()->back();
     }
     public function create(Request $request){
        return view('stagiaires.create');
     }
     public function store(Request $request){

        $stagiaire = Stagiaire::create($request->stagiaire);

        return redirect()->route('stagiaires.index')->with('info', 'Ajout réuissi');
     }
     public function search(Request $request){
        $stagiaires = Stagiaire::orderBy('nom')->with(['demandes', 'creater'])->get();
        return view('stagiaires.search', ['stagiaires' => $stagiaires]);
     }
     public function getStagiaire(Request $request, Stagiaire $stagiaire){
        $stagiaire->load('demandes');
        $stagiaire->load('allstages');
        return $stagiaire;


     }
}

<?php

namespace App\Http\Controllers;

use App\Affectation;
use App\Models\Demande;
use App\Models\Stage;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StageController extends Controller
{
    //
    public function create(Request $request, Affectation $affectation){
        $stagiaires = Stagiaire::orderBy('nom')->get();


        return view('stages.create', [ 'stagiaires' => $stagiaires, 'entities' => $affectation->getEntities()]);
     }
     public function store(Request $request){


        $validator = Validator::make($request->all(), [
            'dateDebut' => 'date|nullable',
            'dateFin' => 'date|nullable',
            'subject' => 'string|nullable',
            'attestationStatut' => 'string|nullable',
            'attestationReferences' => 'string|nullable',
            'affectation' => 'string|nullable'





        ]);
        Stage::create($request->except('_token'));
        return redirect()->route('stages.index');
     }
     public function index(Request $request){
        $stages = Stage::orderBy('created_at', 'DESC')->with('stagiaire')->paginate(5);
       return view('stages.index', ['stages' => $stages]);
    }
    public function deleteStage(Stage $stage){

        $stage->delete();

        return redirect()->back();
     }
     public function edit(Request $request, Stage $stage, Affectation $affectation){
        $stagiaires = Stagiaire::orderBy('nom')->get();
        return view('stages.edit', ['stage' => $stage, 'stagiaires' => $stagiaires, 'entities' => $affectation->getEntities()]);
     }
     public function update(Request $request, Stage $stage){

         $stage->update($request->all());
         $stages = Stage::orderBy('created_at', 'DESC')->with('stagiaire')->paginate(5);
         return view('stages.index', ['stages' => $stages]);

        }
        public function getAttestation(Request $request, string $stage){

            $monstage = Stage::with('stagiaire')->findOrFail($stage);

            return view('stages.attestationStage', ['stage'=> $monstage]);

        }

}

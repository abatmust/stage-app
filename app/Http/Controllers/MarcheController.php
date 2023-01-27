<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarcheController extends Controller
{
    //
    public function create(Request $request){


        return view('marches.create');
     }
     public function store(Request $request){


        $validator = Validator::make($request->all(), [
            'ref' => 'string',
            'objet' => 'string',
            'type' => 'string|nullable',
            'annee' => 'string|nullable',
            'imputationBudgetaire' => 'string|nullable',
            'montant' => 'decimal|nullable',
            'prestataire' => 'string|nullable'

        ]);

        Marche::create($request->except('_token'));
        return redirect()->route('marches.index');
     }
     public function index(Request $request){
        $marches = Marche::orderBy('created_at', 'DESC')->paginate(5);

       return view('marches.index', ['marches' => $marches]);
    }
    public function edit(Request $request, Marche $marche){
        return view('marches.edit', ['marche' => $marche]);
    }
    public function update(Request $request, Marche $marche){
        $validator = Validator::make($request->all(), [
            'ref' => 'string',
            'objet' => 'string',
            'type' => 'string|nullable',
            'annee' => 'string|nullable',
            'imputationBudgetaire' => 'string|nullable',
            'montant' => 'decimal|nullable',
            'prestataire' => 'string|nullable'

        ]);

        $marche->update($request->except('_token'));
        return redirect()->route('marches.index');
    }
    public function deleteMarche(Marche $marche){

        $marche->delete();

        return redirect()->back();
     }
}

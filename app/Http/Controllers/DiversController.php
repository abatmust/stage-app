<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class DiversController extends Controller
{
    //
    public function etiquette(){


        $stages = Stage::whereHas('stagiaire')->whereNotIn('attestationStatut',  ['Délivrée'])->with(['stagiaire'])->get();

        return view('divers.etiquette', ['stages' => $stages]);
    }
    public function statistiques(){


        $stages = Stage::whereHas('stagiaire')->whereNotIn('attestationStatut',  ['Délivrée'])->with(['stagiaire'])->get();

        return view('divers.statistiques', ['stages' => $stages]);
    }
    public function getStatistiques(Request $request, $annee){

        $nbre = Stage::whereYear('created_at', $annee)->with('stagiaire')->orderBy('dateDebut', 'desc')->get();
        return $nbre;


    }


    public function fichefinstage(){




        return view('divers.fichefinstage');
    }


}

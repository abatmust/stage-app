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
}

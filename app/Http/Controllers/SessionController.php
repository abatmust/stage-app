<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Marche;
use App\Models\Session;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    //
    public function create(Request $request){
        $marches = Marche::orderBy('ref')->get();
        $themes = Theme::orderBy('objet')->get();

        return view('sessions.create', ['marches'=> $marches, 'themes'=> $themes]);
     }
     public function store(Request $request){


        $validator = Validator::make($request->all(), [


            'dateDebut' => 'date|nullable',
            'dateFin' => 'date|nullable',
            'periode' => 'string|nullable',
            'nbreParticipants' => 'integer|nullable',
            'nbreJours' => 'integer|nullable',
            'lieu' => 'string|nullable',
            'animateur' => 'string|nullable',
            'marche_id' => 'string|nullable',
            'theme_id' => 'string|nullable'


        ]);

        Session::create($request->except('_token'));
        return redirect()->route('sessions.index');
     }
     public function index(Request $request){
        $sessions = Session::orderBy('created_at', 'DESC')->with(['theme', 'marche'])->paginate(5);

       return view('sessions.index', ['sessions' => $sessions]);
    }
    public function edit(Request $request, Session $session){
        $marches = Marche::orderBy('ref')->get();
        $themes = Theme::orderBy('objet')->get();
        return view('sessions.edit', ['session' => $session, 'marches'=> $marches, 'themes'=> $themes]);
    }
    public function update(Request $request, Session $session){
        $validator = Validator::make($request->all(), [


            'dateDebut' => 'date|nullable',
            'dateFin' => 'date|nullable',
            'periode' => 'string|nullable',
            'nbreParticipants' => 'integer|nullable',
            'nbreJours' => 'integer|nullable',
            'lieu' => 'string|nullable',
            'animateur' => 'string|nullable',
            'marche_id' => 'string|nullable',
            'theme_id' => 'string|nullable'


        ]);

        $session->update($request->except('_token'));
        return redirect()->route('sessions.index');
    }
    public function deleteSession(Session $session){

        $session->delete();

        return redirect()->back();
     }
     public function participation(Session $session){
        $agents = Agent::all();
        return view('sessions.participation', ['session'=> $session, 'agents'=> $agents]);
     }
     public function addAgents(Request $request, Session $session){

        $session->agents()->attach($request['agent_mle']);
        return redirect()->back();
     }
     public function detachAgent(Request $request, Session $session, Agent $agent){

        $session->agents()->detach($agent);
        return redirect()->back();
     }
}

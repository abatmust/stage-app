<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    //
    public function create(Request $request){


        return view('agents.create');
     }
     public function store(Request $request){


        $validator = Validator::make($request->all(), [


            'mle' => 'string|required',
            'nom' => 'string|required',
            'prenom' => 'string|required',
            'affectation' => 'string|nullable',
            'specialite' => 'string|nullable',
            'diplome' => 'string|nullable',
            'observation' => 'string|nullable'



        ]);

        Agent::create($request->except('_token'));
        return redirect()->route('agents.index');
     }
     public function index(Request $request){
        $agents = Agent::orderBy('mle', 'DESC')->paginate(10);

       return view('agents.index', ['agents' => $agents]);
    }
    public function edit(Request $request, Agent $agent){

        return view('agents.edit', ['agent' => $agent]);
    }
    public function update(Request $request, Agent $agent){
        $validator = Validator::make($request->all(), [


            'mle' => 'string|required',
            'nom' => 'string|required',
            'prenom' => 'string|required',
            'affectation' => 'string|nullable',
            'specialite' => 'string|nullable',
            'diplome' => 'string|nullable',
            'observation' => 'string|nullable'


        ]);

        $agent->update($request->except('_token'));
        return redirect()->route('agents.index');
    }
    public function deleteAgent(Agent $agent){

        $agent->delete();

        return redirect()->back();
     }
}

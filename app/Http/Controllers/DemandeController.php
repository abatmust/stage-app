<?php

namespace App\Http\Controllers;

use App\Affectation;
use App\Models\Demande;
use App\Models\Stagiaire;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class DemandeController extends Controller
{
    //
    public function index(Request $request){
        $demandes = Demande::orderBy('created_at', 'DESC')->with(['stagiaires', 'user'])->paginate(5);
       return view('demandes.index', ['demandes' => $demandes]);
    }
    public function create(Request $request){
        $specialites = Demande::whereNotNull('specialite')->select('specialite')->distinct()->get();
        $sorts = Demande::whereNotNull('specialite')->select('sort')->distinct()->get();

       return view('demandes.create', ['specialites' => $specialites, 'sorts' => $sorts]);
    }
    public function createwithoutstagiaire(Request $request){
        $specialites = Demande::whereNotNull('specialite')->select('specialite')->distinct()->get();
        $sorts = Demande::whereNotNull('specialite')->select('sort')->distinct()->get();
        return view('demandes.createwithoutstagiaire', ['specialites' => $specialites, 'sorts' => $sorts]);
     }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'requesters.email.*' => 'email|nullable',
            'requesters.prenom.*' => 'required',
            'requesters.nom.*' => 'required',
            'demande.num_saf' => 'required',
            'demande.date_saf' => 'required|date',
            'PJ' =>'nullable|mimes:pdf|max:2048'

        ]);


        $demande = Demande::create($request->demande);

        for ($i = 1; $i <= count($request->requesters['gender']); $i++) {
            // foreach( $request->requesters as $key => $requester ) {
            //     dd($key,$requester);
            $demande->stagiaires()->create([
                'nom' => $request->requesters['nom'][$i-1],
                'prenom' => $request->requesters['prenom'][$i-1],
                'phone' => $request->requesters['phone'][$i-1],
                'cin' => $request->requesters['cin'][$i-1],
                'email' => $request->requesters['email'][$i-1],
                'gender_situation' => $request->requesters['gender'][$i-1],
                'institut' => $request->requesters['institut'][$i-1],
                'ville' => $request->requesters['ville'][$i-1],


            ]);
        }
        //////////////////////////////////////////////
        if($request->hasFile('PJ')){

             $myDocumentId = Str::uuid();
             $file = $request->file('PJ');


             $path = "demandes/". $myDocumentId . ".pdf";


             $result = Storage::disk('public')->put($path, file_get_contents($request->PJ));
             $demande->pj =  $myDocumentId;
             $demande->save();
         }


        //////////////////////////////////////////////
        return redirect()->route('requests.index');


    }
    public function storewithoutstagiaire(Request $request){

        $validator = Validator::make($request->all(), [

            'demande.num_saf' => 'required',
            'demande.date_saf' => 'required|date',
            'PJ' =>'nullable|mimes:pdf|max:2048'

        ]);


        $demande = Demande::create($request->demande);


        //////////////////////////////////////////////
        if($request->hasFile('PJ')){

             $myDocumentId = Str::uuid();
             $file = $request->file('PJ');


             $path = "demandes/". $myDocumentId . ".pdf";


             $result = Storage::disk('public')->put($path, file_get_contents($request->PJ));
             $demande->pj =  $myDocumentId;
             $demande->save();
         }


        //////////////////////////////////////////////
        return redirect()->route('requests.index');


    }
    public function test(Request $request){
         $demande = Demande::with('user')->find(18);
         dd($demande);
    }
    public function edit(Request $request, Demande $demande){
        $specialites = Demande::whereNotNull('specialite')->select('specialite')->distinct()->get();
        $sorts = Demande::whereNotNull('specialite')->select('sort')->distinct()->get();
        return view('demandes.edit', ['demande' => $demande], ['specialites' => $specialites, 'sorts' => $sorts]);
     }
    public function update(Request $request, Demande $demande){


        $demande->update($request->demande);
        if($request->hasFile('PJ')){

            $myDocumentId = Str::uuid();
            $file = $request->file('PJ');


            $path = "demandes/". $myDocumentId . ".pdf";


            $result = Storage::disk('public')->put($path, file_get_contents($request->PJ));
            $demande->pj =  $myDocumentId;
            $demande->save();
        }
        return redirect()->route('requests.index');
     }
     public function stagiairedemande(Demande $demande){
        $stagiaires = Stagiaire::all();
         return view('demandes.stagiairedemande', ['demande' => $demande, 'stagiaires' => $stagiaires]);
     }
     public function addStagiaireToDemande(Request $request, Demande $demande){
        $validator = Validator::make($request->all(), [
            'demandeur' => 'required|numeric',
        ]);
        $demande->stagiaires()->attach($request->demandeur);

        return redirect()->back();
     }
     public function detachStagiaireFromDemande(Request $request, Demande $demande){
        $validator = Validator::make($request->all(), [
            'stagiaireToDetach' => 'required|numeric',
        ]);
        $demande->stagiaires()->detach($request->stagiaireToDetach);

        return redirect()->back();
     }

     public function deleteDemande(Demande $demande){

        $demande->delete();

        return redirect()->back();
     }
     public function envoiauxservices(){
        $entities = new Affectation;

        $demandes = DB::select("SELECT d.id, s.nom, s.prenom, d.num_saf, d.date_saf, d.specialite, d.sort, s.institut, s.ville, d.created_at
        FROM demandes d JOIN  demande_stagiaire ds JOIN stagiaires s
        ON (d.id = ds.demande_id AND s.id = ds.stagiaire_id)
        WHERE d.sort LIKE '%stance%'
        ORDER BY d.created_at desc");
        //dd($demandes);



        return view('demandes.envoiauxservices', ['entities' => array_flip($entities->responsables), 'demandes' => $demandes]);
     }

}

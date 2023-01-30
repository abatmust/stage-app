<?php

use App\Http\Controllers\DemandeController;
use App\Http\Controllers\DiversController;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', 'login');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //marchés
    Route::get('/themes.create', [ThemeController::class, 'create'])->name('themes.create');
    Route::post('/themes.store', [ThemeController::class, 'store'])->name('themes.store');
    Route::get('/themes.index', [ThemeController::class, 'index'])->name('themes.index');
    Route::get('/themes.edit/{theme}', [ThemeController::class, 'edit'])->name('themes.edit');
    Route::put('/themes.update/{theme}', [ThemeController::class, 'update'])->name('themes.update');
    Route::delete(('deleteTheme/{theme}'),[ThemeController::class, 'deleteTheme'])->name('deleteTheme');
    //marchés
    Route::get('/marches.create', [MarcheController::class, 'create'])->name('marches.create');
    Route::post('/marches.store', [MarcheController::class, 'store'])->name('marches.store');
    Route::get('/marches.index', [MarcheController::class, 'index'])->name('marches.index');
    Route::get('/marches.edit/{marche}', [MarcheController::class, 'edit'])->name('marches.edit');
    Route::put('/marches.update/{marche}', [MarcheController::class, 'update'])->name('marches.update');
    Route::delete(('deleteMarche/{marche}'),[MarcheController::class, 'deleteMarche'])->name('deleteMarche');
    //stage
    Route::get('/stages.create', [StageController::class, 'create'])->name('stages.create');
    Route::post('/stages.store', [StageController::class, 'store'])->name('stages.store');
    Route::get('/stages.index', [StageController::class, 'index'])->name('stages.index');
    Route::delete(('deleteStage/{stage}'),[StageController::class, 'deleteStage'])->name('deleteStage');
    Route::get('/stages.edit/{stage}', [StageController::class, 'edit'])->name('stages.edit');
    Route::put('/stages.update/{stage}', [StageController::class, 'update'])->name('stages.update');
    Route::get('/stages.attestation/{stage}', [StageController::class, 'getAttestation'])->name('stages.attestation');

    // Route::get('/xxx', function(Affectation $service){
    //     $myvar = $service->getEntities();
    //     dump("ok");
    //     dd($myvar);
    // });
    //Divers

    Route::get('/divers.etiquette', [DiversController::class, 'etiquette'])->name('divers.etiquette');
    Route::get('/divers.statistiques', [DiversController::class, 'statistiques'])->name('divers.statistiques');
    Route::get('/divers.fichefinstage', [DiversController::class, 'fichefinstage'])->name('divers.fichefinstage');

    //stagiaires
    Route::get('/stagiaires.index', [StagiaireController::class, 'index'])->name('stagiaires.index');
    Route::get('/stagiaires.edit/{stagiaire}', [StagiaireController::class, 'edit'])->name('stagiaires.edit');
    Route::put('/stagiaires.update/{stagiaire}', [StagiaireController::class, 'update'])->name('stagiaires.update');
    Route::delete(('deleteStagiaire/{stagiaire}'),[StagiaireController::class, 'deleteStagiaire'])->name('deleteStagiaire');
    Route::get('/stagiaires.create', [StagiaireController::class, 'create'])->name('stagiaires.create');
    Route::post('/stagiaires.store', [StagiaireController::class, 'store'])->name('stagiaires.store');
    Route::get('/stagiaires.search', [StagiaireController::class, 'search'])->name('stagiaires.search');
    //demandes
    Route::get('/test', [DemandeController::class, 'test'])->name('test');
    Route::get('/requests.index', [DemandeController::class, 'index'])->name('requests.index');
    Route::get('/requests.create', [DemandeController::class, 'create'])->name('requests.create');
    Route::get('/requests.createwithoutstagiaire', [DemandeController::class, 'createwithoutstagiaire'])->name('requests.createwithoutstagiaire');
    Route::post('/requests.store', [DemandeController::class, 'store'])->name('requests.store');
    Route::post('/requests.storewithoutstagiaire', [DemandeController::class, 'storewithoutstagiaire'])->name('requests.storewithoutstagiaire');
    Route::put('/requests.update/{demande}', [DemandeController::class, 'update'])->name('requests.update');
    Route::get('/requests.edit/{demande}', [DemandeController::class, 'edit'])->name('requests.edit');
    Route::get('/requests.stagiaires/{demande}', [DemandeController::class, 'stagiairedemande'])->name('requests.stagiaires');
    Route::post('/requests.addStagiaire/{demande}', [DemandeController::class, 'addStagiaireToDemande'])->name('addStagiaireToDemande');
    Route::post('/requests.detachStagiaire/{demande}', [DemandeController::class, 'detachStagiaireFromDemande'])->name('detachStagiaireFromDemande');
    Route::delete(('deleteDemande/{demande}'),[DemandeController::class, 'deleteDemande'])->name('deleteDemande');
    Route::get('/requests.envoiauxservices', [DemandeController::class, 'envoiauxservices'])->name('requests.envoiauxservices');


});
require __DIR__.'/auth.php';

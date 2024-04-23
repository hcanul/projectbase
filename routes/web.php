<?php

use App\Http\Controllers\AgentToPdfController;
use App\Http\Controllers\CoordinatorToPdfController;
use App\Http\Livewire\Activist\ActivistController;
use App\Http\Livewire\Agent\AgentController;
use App\Http\Livewire\Asignar\AsignarController;
use App\Http\Livewire\Comprobation\CurpComproabation;
use App\Http\Livewire\Coordinator\CoordinatorController;
use App\Http\Livewire\Journey\JourneyController;
use App\Http\Livewire\Permisos\PermisosController;
use App\Http\Livewire\Role\RoleController;
use App\Http\Livewire\Town\TownController as TownTownController;
use App\Http\Livewire\User\UserController;
use App\Http\Livewire\Voter\VoterController;
use App\Livewire\Town\TownController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('auth.login');});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    //Rutas de la tabla usuarios
    Route::middleware(['role_or_permission:superuser'])->group( function () {
        Route::group(['prefix' => 'administrador'], function () {
            Route::get('Users', UserController::class)->name('indexUsers');
            Route::get('roles', RoleController::class)->name('indexRoles');
            Route::get('permisos', PermisosController::class)->name('indexPermisos');
            Route::get('asignarpermisos', AsignarController::class)->name('indexAsignarPermisos');
        });
    });

    Route::middleware(['role_or_permission:superuser|administrador'])->group(function () {
        Route::group(['prefix' => 'Captura'], function() {
            Route::get('RutasTotales', JourneyController::class)->name('indexRutas');
            Route::get('TownsTotales', TownTownController::class)->name('indexTowns');
            Route::get('Coordinadores', CoordinatorController::class)->name('indexCoordinator');
            Route::get('Agentes', AgentController::class)->name('indexAgent');
            Route::get('Activistas', ActivistController::class)->name('indexActivist');
            Route::get('Votantes', VoterController::class)->name('indexVotantes');
            Route::get('Comprobation', CurpComproabation::class)->name('indexComprobation');
        });

        Route::group(['prefix' => 'Reportes'], function (){
            Route::get('ReporteCoordinador', [CoordinatorToPdfController::class, 'CoordinatorPdf'])->name('ReportCoordinador');
            Route::get('ReporteAgentes', [AgentToPdfController::class, 'AgentPdf'])->name('ReportAgent');
        });
    });
});

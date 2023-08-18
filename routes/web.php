<?php

use App\Http\Livewire\Asignar\AsignarController;
use App\Http\Livewire\Permisos\PermisosController;
use App\Http\Livewire\Role\RoleController;
use App\Http\Livewire\User\UserController;
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
    Route::middleware(['role_or_permission:SuperUser'])->group(function () {
        Route::group(['prefix' => 'Admin'], function(){
            Route::get('Users', UserController::class)->name('indexUsers');
            Route::get('Roles', RoleController::class)->name('indexRoles');
            Route::get('Permisos', PermisosController::class)->name('indexPermisos');
            Route::get('AsignarPermisos', AsignarController::class)->name('indexAsignarPermisos');

        });
    });
});


<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FarmaciaController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\ObraSocialController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/administrador', function () {
    return view('admin.administrador');
})->name('homeAdministrador')->middleware('roles:es-administrador');

<<<<<<< HEAD
=======

>>>>>>> b6110b669e999d70fbe82a315a6ffab2cb5644e5
Auth::routes();
Route::post('login',  [LoginController::class,'loginPersonalizado']);
Route::get('register/farmaceutico', [RegisterController::class,'showRegisFarmaceuticoForm'])->name('farmaceutico');
Route::post('register/farmaceutico', [RegisterController::class,'registroFarmaceutico'])->name('registroFarmaceutico');

Route::resource('farmacia', FarmaciaController::class)->middleware('roles:es-farmaceutico');
Route::get('farmacias', [FarmaciaController::class,'listarFarmacias'])->name('farmacias');
Route::get('farmaciasucursal/{farmacia}', [SucursalController::class,'farmaciaSucursal'])->name('farmaciaSucursal');
Route::get('verfarmacia',[FarmaciaController::class,'verFarmacia'])->middleware('roles:es-farmaceutico')->name('verfarmacia');
Route::post('buscarfarmaciasucursal/', [SucursalController::class,'buscarFarmaciaSucursal'])->name('buscarFarmaciaSucursal');
//Al usar el middleware RolMiddleware podemos enviar mas de un rol, pero debemos cambiar ('roles:esAdmin') o por (roles:slug_rol) siendo slug_rol el valor del atributo de la Base de Datos 
// porque antes estabamos usando gates , pero a las gates no le podemos pasar mas de un ROL al mismo tiempo en las rutas
// Esto es solo para las rutas, en las vistas seguimos usando gates y para definir varias gates en la vista
// hacemos @canany(['nombreGate1','nombreGate2']) .... @endcanany
Route::resource('usuario', UsuarioController::class)->middleware('roles:es-administrador');
Route::get('usuario/{usuario}/rolypermisos',[UsuarioController::class,'usuarioRolesyPermisos'])->name('usuario.rolpermisos')->middleware('roles:es-administrador');
Route::post('usuario/rolypermisos',[UsuarioController::class,'almacenarRolesyPermisos'])->name('usuario.almacenarrolpermisos')->middleware('roles:es-administrador');
Route::resource('roles', RolesController::class)->middleware('roles:es-administrador');
Route::resource('permisos', PermisosController::class)->middleware('roles:es-administrador');
Route::resource('localidad', LocalidadController::class)->middleware('roles:es-administrador');
Route::get('farmacias', [FarmaciaController::class,'listarFarmacias'])->name('farmacias');


Route::resource('turno', TurnoController::class)->middleware('roles:es-administrador');
Route::resource('sucursal', SucursalController::class)->middleware('roles:es-farmaceutico');

Route::resource('obrasocial', ObraSocialController::class)->middleware('roles:es-farmaceutico');
Route::get('obrasocialfarmacia', [ObraSocialController::class, 'listarObraSocialFarmacia'])->middleware('roles:es-farmaceutico')->name('obrasocialfarmacia');
<<<<<<< HEAD
Route::post('obrasocialfarmacia', [ObraSocialController::class, 'agregarObraSocialFarmacia'])->middleware('roles:es-farmaceutico')->name('agregarobrasocialfarmacia');
=======
Route::post('obrasocialfarmacia', [ObraSocialController::class, 'agregarObraSocialFarmacia'])->middleware('roles:es-farmaceutico')->name('agregarobrasocialfarmacia');
>>>>>>> b6110b669e999d70fbe82a315a6ffab2cb5644e5

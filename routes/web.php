<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;

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

Route::group(['middleware' => 'guest'], function(){
    Route::get('/', function () {
        return redirect()->route('login');
    });
    /**
     * Rutas para el Ingreso al Sistema, además, se conserva la función "Cerrar Sesión"
     */
    Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class,'login_attemps'])->name('login_attemps');
});

Route::group(['middleware' => ['auth']], function(){
    // Cierre de sesión
    Route::post('logout', [LoginController::class,'logout'])->name('logout');
	// Usuarios
	Route::get('lista-usuarios',[UserController::class,'getUsers'])->name('user.get');
	Route::get('lista-usuarios/ajax',[UserController::class,'listUsers'])->name('user.getList');
	Route::get('nuevo-usuario',[UserController::class,'createUser'])->name('user.create');
	Route::get('actualizar-usuario/{id}',[UserController::class,'editUser'])->name('user.edit');
	Route::post('nuevo-usuario/guardar',[UserController::class,'storeUser'])->name('user.store');
	Route::put('actualizar-usuario/guardar/{id}',[UserController::class,'updateUser'])->name('user.update');
	Route::put('usuario/activar/{id}',[UserController::class,'disableUser'])->name('user.disable');
	// Directiva
	Route::get('lista-staff',[StaffController::class,'getStaff'])->name('staff.get');
	Route::get('lista-staff/ajax',[StaffController::class,'listStaff'])->name('staff.getList');
	Route::get('nuevo-staff',[StaffController::class,'createStaff'])->name('staff.create');
	Route::get('actualizar-staff/{id}',[StaffController::class,'editStaff'])->name('staff.edit');
	Route::post('nuevo-staff/guardar',[StaffController::class,'storeStaff'])->name('staff.store');
	Route::put('actualizar-staff/guardar/{id}',[StaffController::class,'updateStaff'])->name('staff.update');
	Route::put('staff/activar/{id}',[StaffController::class,'disableStaff'])->name('staff.disable');
	// Asignación de articulos a personal del Directorio
	Route::get('asignacion-staff/{id}',[ArticleController::class,'assignmentStaff'])->name('article.assignmentStaff');
	Route::post('asignacion-staff/actualizar/{id}',[ArticleController::class,'storeassignmentStaff'])->name('store.assignmentStaff');
		// Detalle de Foto - Directiva
		Route::get('lista-detalle/{id}',[StaffController::class,'getDetail'])->name('staffDetail.get');
		Route::get('nuevo-detalle/{id}',[StaffController::class,'createDetail'])->name('staffDetail.create');
		Route::post('nuevo-detalle/guardar',[StaffController::class,'storeDetail'])->name('staffDetail.store');
		Route::get('actualizar-detalle/{id}',[StaffController::class,'editDetail'])->name('staffDetail.edit');
		Route::put('actualizar-detalle/guardar/{id}',[StaffController::class,'updateDetail'])->name('staffDetail.update');
		Route::put('staff-detalle/activar/{id}',[StaffController::class,'disableDetail'])->name('staffDetail.disable');
		Route::put('staff-detalle/delete/{id}',[StaffController::class,'deleteDetail'])->name('staffDetail.delete');
		Route::get('staff/pdf/{id}',[StaffController::class,'pdf'])->name('staff.pdf');
});
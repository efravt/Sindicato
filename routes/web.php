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
		// Redes Sociales - Directiva
		Route::get('lista-staffSocial/{id}',[StaffController::class,'getStaffSocial'])->name('staffSocial.get');
		Route::get('lista-staffSocial/ajax/{id}',[StaffController::class,'listStaffSocial'])->name('staffSocial.getList');
		Route::get('nuevo-staffSocial/{id}',[StaffController::class,'createStaffSocial'])->name('staffSocial.create');
		Route::get('actualizar-staffSocial/{id}',[StaffController::class,'editStaffSocial'])->name('staffSocial.edit');
		Route::post('nuevo-staffSocial/guardar',[StaffController::class,'storeStaffSocial'])->name('staffSocial.store');
		Route::put('actualizar-staffSocial/guardar/{id}',[StaffController::class,'updateStaffSocial'])->name('staffSocial.update');
		Route::put('staffSocial/activar/{id}',[StaffController::class,'disableStaffSocial'])->name('staffSocial.disable');
		// Detalle de Foto - Directiva
		Route::get('lista-detalle/{id}',[StaffController::class,'getDetail'])->name('staffDetail.get');
		Route::get('nuevo-detalle/{id}',[StaffController::class,'createDetail'])->name('staffDetail.create');
		Route::post('nuevo-detalle/guardar',[StaffController::class,'storeDetail'])->name('staffDetail.store');
		Route::get('actualizar-detalle/{id}',[StaffController::class,'editDetail'])->name('staffDetail.edit');
		Route::put('actualizar-detalle/guardar/{id}',[StaffController::class,'updateDetail'])->name('staffDetail.update');
		Route::put('staff-detalle/activar/{id}',[StaffController::class,'disableDetail'])->name('staffDetail.disable');
		Route::put('staff-detalle/delete/{id}',[StaffController::class,'deleteDetail'])->name('staffDetail.delete');
	// Areas
	Route::get('lista-areas',[AreaController::class,'getArea'])->name('area.get');
	Route::get('lista-areas/ajax',[AreaController::class,'listArea'])->name('area.getList');
	Route::get('nuevo-area',[AreaController::class,'createArea'])->name('area.create');
	Route::get('actualizar-area/{id}',[AreaController::class,'editArea'])->name('area.edit');
	Route::post('nuevo-area/guardar',[AreaController::class,'storeArea'])->name('area.store');
	Route::put('actualizar-area/guardar/{id}',[AreaController::class,'updateArea'])->name('area.update');
	Route::put('area/activar/{id}',[AreaController::class,'disableArea'])->name('area.disable');
	// Eventos
	Route::get('lista-eventos',[EventController::class,'getEvent'])->name('event.get');
	Route::get('lista-eventos/ajax',[EventController::class,'listEvent'])->name('event.getList');
	Route::get('nuevo-evento',[EventController::class,'createEvent'])->name('event.create');
	Route::get('actualizar-evento/{id}',[EventController::class,'editEvent'])->name('event.edit');
	Route::post('nuevo-evento/guardar',[EventController::class,'storeEvent'])->name('event.store');
	Route::put('actualizar-evento/guardar/{id}',[EventController::class,'updateEvent'])->name('event.update');
	Route::put('evento/activar/{id}',[EventController::class,'disableEvent'])->name('event.disable');
		// Detalle de Foto - Evento 
		Route::get('lista-detalle-evento/{id}',[EventController::class,'getDetail'])->name('eventDetail.get');
		Route::get('nuevo-detalle-evento/{id}',[EventController::class,'createDetail'])->name('eventDetail.create');
		Route::post('nuevo-detalle-evento/guardar',[EventController::class,'storeDetail'])->name('eventDetail.store');
		Route::get('actualizar-detalle-evento/{id}',[EventController::class,'editDetail'])->name('eventDetail.edit');
		Route::put('actualizar-detalle-evento/guardar/{id}',[EventController::class,'updateDetail'])->name('eventDetail.update');
		Route::put('evento-detalle/activar/{id}',[EventController::class,'disableDetail'])->name('eventDetail.disable');
		Route::put('evento-detalle/delete/{id}',[EventController::class,'deleteDetail'])->name('eventDetail.delete');
	// Articulos
	Route::get('lista-articulos',[ArticleController::class,'getArticle'])->name('article.get');
	Route::get('lista-articulos/ajax',[ArticleController::class,'listArticle'])->name('article.getList');
	Route::get('nuevo-articulo',[ArticleController::class,'createArticle'])->name('article.create');
	Route::get('actualizar-articulo/{id}',[ArticleController::class,'editArticle'])->name('article.edit');
	Route::post('nuevo-articulo/guardar',[ArticleController::class,'storeArticle'])->name('article.store');
	Route::put('actualizar-articulo/guardar/{id}',[ArticleController::class,'updateArticle'])->name('article.update');
	Route::put('articulo/activar/{id}',[ArticleController::class,'disableArticle'])->name('article.disable');
		// Detalle de Foto - Articulo 
		Route::get('lista-detalle-articulo/{id}',[ArticleController::class,'getDetail'])->name('articleDetail.get');
		Route::get('nuevo-detalle-articulo/{id}',[ArticleController::class,'createDetail'])->name('articleDetail.create');
		Route::post('nuevo-detalle-articulo/guardar',[ArticleController::class,'storeDetail'])->name('articleDetail.store');
		Route::get('actualizar-detalle-articulo/{id}',[ArticleController::class,'editDetail'])->name('articleDetail.edit');
		Route::put('actualizar-detalle-articulo/guardar/{id}',[ArticleController::class,'updateDetail'])->name('articleDetail.update');
		Route::put('articulo-detalle/activar/{id}',[ArticleController::class,'disableDetail'])->name('articleDetail.disable');
		Route::put('articulo-detalle/delete/{id}',[ArticleController::class,'deleteDetail'])->name('articleDetail.delete');
	// Subscriptores
	Route::get('lista-contactos',[ContactController::class,'getContact'])->name('contact.get');
	Route::get('lista-contactos/ajax',[ContactController::class,'listContact'])->name('contact.getList');
	Route::get('lista-subscriptores/ajax',[ContactController::class,'listSubscribe'])->name('subscriptor.getList');
	Route::put('contact/read/{id}',[ContactController::class,'readContact'])->name('contact.read');

	
	// Miembro
	Route::get('lista-member',[MemberController::class,'getMember'])->name('member.get');
	Route::get('lista-member/ajax',[MemberController::class,'listMember'])->name('member.getList');
	Route::get('nuevo-member',[MemberController::class,'createMember'])->name('member.create');
	Route::get('actualizar-member/{id}',[MemberController::class,'editMember'])->name('member.edit');
	Route::post('nuevo-member/guardar',[MemberController::class,'storeMember'])->name('member.store');
	Route::put('actualizar-member/guardar/{id}',[MemberController::class,'updateMember'])->name('member.update');
	Route::put('member/activar/{id}',[MemberController::class,'disableMember'])->name('member.disable');
	// Asignación de articulos a personal Miembro o Investigador
	Route::get('asignacion-member/{id}',[ArticleController::class,'assignmentMember'])->name('article.assignmentMember');
	Route::post('asignacion-member/actualizar/{id}',[ArticleController::class,'storeassignmentMember'])->name('store.assignmentMember');
		// Redes Sociales - Miembro
		Route::get('lista-memberSocial/{id}',[MemberController::class,'getMemberSocial'])->name('memberSocial.get');
		Route::get('lista-memberSocial/ajax/{id}',[MemberController::class,'listMemberSocial'])->name('memberSocial.getList');
		Route::get('nuevo-memberSocial/{id}',[MemberController::class,'createMemberSocial'])->name('memberSocial.create');
		Route::get('actualizar-memberSocial/{id}',[MemberController::class,'editMemberSocial'])->name('memberSocial.edit');
		Route::post('nuevo-memberSocial/guardar',[MemberController::class,'storeMemberSocial'])->name('memberSocial.store');
		Route::put('actualizar-memberSocial/guardar/{id}',[MemberController::class,'updateMemberSocial'])->name('memberSocial.update');
		Route::put('memberSocial/activar/{id}',[MemberController::class,'disableMemberSocial'])->name('memberSocial.disable');
		// Detalle de Foto - Miembro
		Route::get('lista-detalle-mem/{id}',[MemberController::class,'getDetail'])->name('memberDetail.get');
		Route::get('nuevo-detalle-mem/{id}',[MemberController::class,'createDetail'])->name('memberDetail.create');
		Route::post('nuevo-detalle-mem/guardar',[MemberController::class,'storeDetail'])->name('memberDetail.store');
		Route::get('actualizar-detalle-mem/{id}',[MemberController::class,'editDetail'])->name('memberDetail.edit');
		Route::put('actualizar-detalle-mem/guardar/{id}',[MemberController::class,'updateDetail'])->name('memberDetail.update');
		Route::put('member-detalle-mem/activar/{id}',[MemberController::class,'disableDetail'])->name('memberDetail.disable');
		Route::put('member-detalle-mem/delete/{id}',[MemberController::class,'deleteDetail'])->name('memberDetail.delete');
});
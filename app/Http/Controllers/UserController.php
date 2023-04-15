<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
	/**
	 * Se obtiene vista de Usuarios
	 * URL : lista-usuarios
	 * Method: GET
	 */
	public function getUsers(){
		// Se obtiene usuarios de acuerdo a la clinica que este registrada
    	return view('user.list');	
	}
	/**
	 * Se obtiene una lista de los usuarios para listar
	 * URL : lista-usuarios
	 * Method: GET
	 */
	public function listUsers(){
	    $users = User::select('codigo', 'nombre', 'paterno', 'materno', 'email', 'estado')->get();
		return datatables()
                ->of($users)
                ->addColumn('state', '<label class="badge badge-{{$estado?"success":"danger"}}">{{$estado?"Activo":"Inactivo"}}</label>')
                ->addColumn('action','
					<button class="btn btn-icon btn-{{ $estado?"danger":"success" }} btn-sm waves-effect waves-light disableUser" type="button" data-id="{{ $codigo }}">
						<i class="feather icon-{{$estado?"x":"check"}}">
						</i>
					</button>

					<a href="{{ route(\'user.edit\',$codigo) }}">
						<button class="btn btn-icon btn-info btn-sm waves-effect waves-light" type="button">
							<i class="feather icon-edit-2">
							</i>
						</button>
					</a>')
                ->rawColumns(['state', 'action'])
                ->toJson();
	}
	/**
	 * Se redirecciona al formulario para crear un nuevo Usuario
	 * URL : nuevo-usuario
	 * Method: GET
	 */
	public function createUser(){
    	return view('user.new');
	}
	/**
	 * Se almacena toda la información del nuevo Usuario con la 
	 * Especialidad asignada.
	 * URL : nuevo-usuario/guardar
	 * Method: POST
	 */
	public function storeUser(Request $request){
		$user              	= new User;
        $user->nombre       = $request->nombre;
        $user->paterno      = $request->paterno;
        $user->materno      = $request->materno;
        $user->email        = $request->email;
        $user->password		= bcrypt($request->password);
        $user->save();
        return response()->json([
        	'message'	=>'Registro creado exitosamente.'
        ], 200);
	}
	/**
	 * Se redirecciona al formulario para actualizar el Usuario seleccionado
	 * URL : actualizar-usuario/{id}
	 * Method: GET
	 */
	public function editUser($id){
		
        $user 	 = User::FindOrFail($id);

    	return view('user.edit', [
    		'user'			=> $user
    	]);
	}
	/**
	 * Se almacena toda la información del nuevo Usuario con la usuario
	 * URL : nuevo-usuario/guardar
	 * Method: POST
	 */
	public function updateUser(Request $request, $id){
		$user              	= User::FindOrFail($id);
        $user->nombre       = $request->nombre;
        $user->paterno      = $request->paterno;
        $user->materno      = $request->materno;
        $user->email        = $request->email;
        if(!empty($user->password)){
        	$user->password = bcrypt($request->password);
        }
        $user->update();
		
        return response()->json([
        	'message'	=>'Registro actualizado exitosamente.'
        ], 200);
	}
    /**
      * Actualiza el estado del Usuario a activo.
      * Tipo: PUT
      * URL: usuario/activar/{id}
      */
    public function disableUser(Request $request, $id){
        $user = User::FindOrFail($id);
        $user->estado = $user->estado ? 0 : 1;
        $user->update();
        return response()->json(['message'=>'Registro actualizado correctamente.'], 200);
    }
}

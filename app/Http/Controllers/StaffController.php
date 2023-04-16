<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Vehiculo;
use DB;

class StaffController extends Controller
{
	/******************************************************************/
	/**
	 * Se obtiene vista de socios
	 * URL : lista-socios
	 * Method: GET
	 */
	public function getStaff(){
		// Se obtiene socios de acuerdo a la clinica que este registrada
    	return view('staff.list');	
	}
	/**
	 * Se obtiene una lista de los socios para listar
	 * URL : lista-socios
	 * Method: GET
	 */
	public function listStaff(){
	    $staff = Staff::get();
		return datatables()
                ->of($staff)
                ->addColumn('photo', '<img class="round" src="../../img_admin/socio/{{$foto}}" alt="avatar" height="30" width="30"> {{$nombre}}')
                ->addColumn('state', '<label class="badge badge-{{$estado?"success":"danger"}}">{{$estado?"Activo":"Inactivo"}}</label>')
                ->addColumn('action','
					<button class="btn btn-icon btn-{{ $estado?"danger":"success" }} btn-sm waves-effect waves-light disableStaff" type="button" data-codigo="{{ $codigo }}" title="Estado">
						<i class="feather icon-{{$estado?"x":"check"}}">
						</i>
					</button>

					<a href="{{ route(\'staff.edit\',$codigo) }}">
						<button class="btn btn-icon btn-info btn-sm waves-effect waves-light" type="button" title="Editar">
							<i class="feather icon-edit-2">
							</i>
						</button>
					</a>
					<a href="{{ route(\'staffDetail.get\',$codigo) }}">
						<button class="btn btn-icon btn-primary btn-sm waves-effect waves-light" type="button" title="Gestionar Vehiculos">
							<i class="feather icon-folder">
							</i>
						</button>
					</a>')
                ->rawColumns(['state', 'action', 'photo'])
                ->toJson();
	}
	/**
	 * Se redirecciona al formulario para crear un nuevo socio
	 * URL : nuevo-socio
	 * Method: GET
	 */
	public function createStaff(){
    	return view('staff.new');
	}
	/**
	 * Se almacena toda la información del nuevo socio con la 
	 * Especialidad asignada.
	 * URL : nuevo-socio/guardar
	 * Method: POST
	 */
	public function storeStaff(Request $request){
		// Socio
		$staff           = new Staff;
		$staff->nombre	 = $request->nombre;
		$staff->paterno	 = $request->paterno;
		$staff->materno	 = $request->materno;
		$staff->ci		 = $request->ci;
		$staff->ingreso	 = $request->ingreso;
		$staff->numero	 = $request->numero;
		if($request->hasfile('foto')){
            $file 			= $request->file('foto');
            $name   		= time()."_".$file->getClientOriginalName();
            $staff->foto 	= $name;
            $file->move(public_path().'/img_admin/socio/',$name);
        }
		$staff->save();
		// Vehiculo
		$vehiculo           = new Vehiculo;
		$vehiculo->cod_socio	 = $staff->codigo;
		$vehiculo->marca		 = $request->marca;
		$vehiculo->color		 = $request->color;
		$vehiculo->modelo		 = $request->modelo;
		$vehiculo->capacidad	 = $request->capacidad;
		$vehiculo->clase		 = $request->clase;
		$vehiculo->tipo_vehiculo = $request->tipo_vehiculo;
		$vehiculo->categoria	 = $request->categoria;
		$vehiculo->llantas		 = $request->llantas;
		$vehiculo->placa		 = $request->placa;
		$vehiculo->estado		 = 1; // Activo
		$vehiculo->tipo			 = 1; // 1: Principal
		$vehiculo->save();
		
        return response()->json([
        	'message'	=>'Registro creado exitosamente.'
        ], 200);
	}
	/**
	 * Se redirecciona al formulario para actualizar el socio seleccionado
	 * URL : actualizar-socio/{id}
	 * Method: GET
	 */
	public function editStaff($id){
		
        $staff 	 = Staff::FindOrFail($id);

    	return view('staff.edit', [
    		'staff'			=> $staff
    	]);
	}
	/**
	 * Se almacena toda la información del nuevo socio con la socio
	 * URL : nuevo-socio/guardar
	 * Method: POST
	 */
	public function updateStaff(Request $request, $id){
		$staff              	= Staff::FindOrFail($id);
		$staff->nombre	 = $request->nombre;
		$staff->paterno	 = $request->paterno;
		$staff->materno	 = $request->materno;
		$staff->ci		 = $request->ci;
		$staff->ingreso	 = $request->ingreso;
		$staff->numero	 = $request->numero;
		if($request->hasfile('foto')){
            $image_path 	= public_path().'/img_admin/socio/'.$staff->photo;
            \File::delete($image_path);
            $file 			= $request->file('foto');
            $name   		= time()."_".$file->getClientOriginalName();
            $staff->foto 	= $name;
            $file->move(public_path().'/img_admin/socio/',$name);
        }
        $staff->update();
		
        return response()->json([
        	'message'	=>'Registro actualizado exitosamente.'
        ], 200);
	}
    /**
      * Actualiza el estado del socio a activo.
      * Tipo: PUT
      * URL: socio/activar/{id}
      */
    public function disableStaff(Request $request, $id){
        $staff = Staff::FindOrFail($id);
        $staff->estado = $staff->estado ? 0 : 1;
        $staff->update();
        return response()->json(['message'=>'Registro actualizado correctamente.'], 200);
    }
	
	/******************************************************************/
	/**
	 * Se obtiene vista de DETALLE IMAGENES
	 * URL : lista-redes sociales
	 * Method: GET
	 */
	public function getDetail($staff_id){
        $staff 	 	  = Staff::FindOrFail($staff_id);
        $vehiculo 	  = Vehiculo::where('cod_socio', $staff_id)->where('tipo', 1)->first();
        $staffDetails = Vehiculo::where('cod_socio', $staff_id)->where('tipo', 2)->get();
    	return view('staff.detailList',[
			'staff'			=> $staff,
			'vehiculo'		=> $vehiculo,
			'staffDetails'	=> $staffDetails,
		]);	
	}
	/**
	 * Se redirecciona al formulario para crear
	 * URL : nuevo-detalle/{id}
	 * Method: GET
	 */
	public function createDetail($staff_id){
        $staff 	 	  = Staff::FindOrFail($staff_id);
    	return view('staff.detailNew',[
			'staff' => $staff
		]);
	}
	/**
	 * Se almacena datos de Detalle
	 * URL : nuevo-Administracione/guardar
	 * Method: POST
	 */
	public function storeDetail(Request $request){
		$vehiculo           = new Vehiculo;
		$vehiculo->cod_socio	 = $request->cod_socio;
		$vehiculo->marca		 = $request->marca;
		$vehiculo->color		 = $request->color;
		$vehiculo->modelo		 = $request->modelo;
		$vehiculo->capacidad	 = $request->capacidad;
		$vehiculo->clase		 = $request->clase;
		$vehiculo->tipo_vehiculo = $request->tipo_vehiculo;
		$vehiculo->categoria	 = $request->categoria;
		$vehiculo->llantas		 = $request->llantas;
		$vehiculo->placa		 = $request->placa;
		$vehiculo->estado		 = 1; // Activo
		$vehiculo->tipo			 = 2; // 1: Apoyo
		$vehiculo->save();
        return response()->json([
        	'message'	=>'Registro creado exitosamente.'
        ], 200);
	}
	/**
	 * Se redirecciona al formulario para actualizar
	 * URL : actualizar-detalle/{id}
	 * Method: GET
	 */
	public function editDetail($id){
		
		$staffDetail = Vehiculo::FindOrFail($id);
        $staff 	 	 = Staff::FindOrFail($staffDetail->cod_socio);

    	return view('staff.detailEdit', [
			'staff'		  => $staff,
    		'staffDetail' => $staffDetail,
    	]);
	}
	/**
	 * Actualiza la información
	 * URL : nuevo-detalle/guardar
	 * Method: POST
	 */
	public function updateDetail(Request $request, $id){
		$vehiculo              	 = Vehiculo::FindOrFail($id);
		$vehiculo->marca		 = $request->marca;
		$vehiculo->color		 = $request->color;
		$vehiculo->modelo		 = $request->modelo;
		$vehiculo->capacidad	 = $request->capacidad;
		$vehiculo->clase		 = $request->clase;
		$vehiculo->tipo_vehiculo = $request->tipo_vehiculo;
		$vehiculo->categoria	 = $request->categoria;
		$vehiculo->llantas		 = $request->llantas;
		$vehiculo->placa		 = $request->placa;
        $vehiculo->update();
		
        return response()->json([
        	'message'	=>'Registro actualizado exitosamente.'
        ], 200);
	}
    /**
      * Actualiza el estado del Detalle a activo.
      * Tipo: PUT
      * URL: staff-detalle/activar/{id}
      */
    public function disableDetail($id){
        $staff = Vehiculo::FindOrFail($id);
        $staff->state = $staff->state ? 0 : 1;
        $staff->update();
        return response()->json(['message'=>'Registro actualizado correctamente.'], 200);
    }
}

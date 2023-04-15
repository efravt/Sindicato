<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\StaffSocial;
use App\Models\Social;
use App\Models\StaffDetail;
use DB;

class StaffController extends Controller
{
	/******************************************************************/
	/**
	 * Se obtiene vista de Administraciones
	 * URL : lista-Administraciones
	 * Method: GET
	 */
	public function getStaff(){
		// Se obtiene Administraciones de acuerdo a la clinica que este registrada
    	return view('staff.list');	
	}
	/**
	 * Se obtiene una lista de los Administraciones para listar
	 * URL : lista-Administraciones
	 * Method: GET
	 */
	public function listStaff(){
	    $staff = Staff::get();
		return datatables()
                ->of($staff)
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
					<a href="{{ route(\'staffSocial.get\',$codigo) }}">
						<button class="btn btn-icon btn-primary btn-sm waves-effect waves-light" type="button" title="Redes Sociales">
							<i class="feather icon-folder">
							</i>
						</button>
					</a>')
                ->rawColumns(['state', 'action'])
                ->toJson();
	}
	/**
	 * Se redirecciona al formulario para crear un nuevo Administracione
	 * URL : nuevo-Administracione
	 * Method: GET
	 */
	public function createStaff(){
    	return view('staff.new');
	}
	/**
	 * Se almacena toda la información del nuevo Administracione con la 
	 * Especialidad asignada.
	 * URL : nuevo-Administracione/guardar
	 * Method: POST
	 */
	public function storeStaff(Request $request){
		$staff           = new Staff;
        $staff->name        = $request->name;
        $staff->paternal    = $request->paternal;
        $staff->maternal    = $request->maternal;
        $staff->email       = $request->email;
        $staff->ci          = $request->ci;
        $staff->phone       = $request->phone;
        $staff->phone1      = $request->phone1;
        $staff->city        = $request->city;
        $staff->country     = $request->country;
        $staff->specialty   = $request->specialty;
        $staff->rol     	= $request->rol;
        $staff->bibliography= $request->bibliography;
        $staff->user_id     = auth()->user()->user_id;

		if($request->hasfile('photo')){
            $image_path 	= public_path().'/img_admin/staff/'.$staff->photo;
            \File::delete($image_path);
            $file 			= $request->file('photo');
            $name   		= time()."_".$file->getClientOriginalName();
            $staff->photo 	= $name;
            $file->move(public_path().'/img_admin/staff/',$name);
        }
        $staff->save();
        return response()->json([
        	'message'	=>'Registro creado exitosamente.'
        ], 200);
	}
	/**
	 * Se redirecciona al formulario para actualizar el Administracione seleccionado
	 * URL : actualizar-Administracione/{id}
	 * Method: GET
	 */
	public function editStaff($id){
		
        $staff 	 = Staff::FindOrFail($id);

    	return view('staff.edit', [
    		'staff'			=> $staff
    	]);
	}
	/**
	 * Se almacena toda la información del nuevo Administracione con la Administracione
	 * URL : nuevo-Administracione/guardar
	 * Method: POST
	 */
	public function updateStaff(Request $request, $id){
		$staff              	= Staff::FindOrFail($id);
        $staff->name        = $request->name;
        $staff->paternal    = $request->paternal;
        $staff->maternal    = $request->maternal;
        $staff->email       = $request->email;
        $staff->ci          = $request->ci;
        $staff->phone       = $request->phone;
        $staff->phone1      = $request->phone1;
        $staff->city        = $request->city;
        $staff->country     = $request->country;
        $staff->specialty   = $request->specialty;
        $staff->rol     	= $request->rol;
        $staff->bibliography= $request->bibliography;
        $staff->user_id     = auth()->user()->user_id;
		if($request->hasfile('photo')){
            $image_path 	= public_path().'/img_admin/staff/'.$staff->photo;
            \File::delete($image_path);
            $file 			= $request->file('photo');
            $name   		= time()."_".$file->getClientOriginalName();
            $staff->photo 	= $name;
            $file->move(public_path().'/img_admin/staff/',$name);
        }
        $staff->update();
		
        return response()->json([
        	'message'	=>'Registro actualizado exitosamente.'
        ], 200);
	}
    /**
      * Actualiza el estado del Administracione a activo.
      * Tipo: PUT
      * URL: Administracione/activar/{id}
      */
    public function disableStaff(Request $request, $id){
        $staff = Staff::FindOrFail($id);
        $staff->estado = $staff->estado ? 0 : 1;
        $staff->update();
        return response()->json(['message'=>'Registro actualizado correctamente.'], 200);
    }
	/******************************************************************/
	/**
	 * Se obtiene vista de redes sociales
	 * URL : lista-redes sociales
	 * Method: GET
	 */
	public function getStaffSocial($id){
        $staff 	 = Staff::FindOrFail($id);
    	return view('staff.socialList',[
			'staff'	=> $staff
		]);	
	}
	/**
	 * Se obtiene una lista de los social Staff para listar
	 * URL : lista-staffSocial
	 * Method: GET
	 */
	public function listStaffSocial($staff_id){
	    $staff = StaffSocial::where('staff_id', $staff_id)->get();
		return datatables()
                ->of($staff)
                ->addColumn('state', '<label class="badge badge-{{$state?"success":"danger"}}">{{$state?"Activo":"Inactivo"}}</label>')
                ->addColumn('ruta', '<a href="{{$url}}" target="_blank">{{$url}}</a>')
                ->addColumn('action','
					<button class="btn btn-icon btn-{{ $state?"danger":"success" }} btn-sm waves-effect waves-light disableStaffSocial" type="button" data-id="{{ $staff_social_id }}">
						<i class="feather icon-{{$state?"x":"check"}}">
						</i>
					</button>

					<a href="{{ route(\'staffSocial.edit\',$staff_social_id) }}">
						<button class="btn btn-icon btn-info btn-sm waves-effect waves-light" type="button">
							<i class="feather icon-edit-2">
							</i>
						</button>
					</a>')
                ->rawColumns(['state', 'ruta', 'action'])
                ->toJson();
	}
	
	/**
	 * Se redirecciona al formulario para crear un nuevo Administracione
	 * URL : nuevo-Administracione
	 * Method: GET
	 */
	public function createStaffSocial($staff_id){
        $staff 	 = Staff::FindOrFail($staff_id);
        $socials = Social::where('state', 1)->get();
    	return view('staff.socialNew',[
			'staff'		=> $staff,
			'socials'	=> $socials
		]);
	}
	/**
	 * Se almacena toda la información del nuevo Administracione con la 
	 * Especialidad asignada.
	 * URL : nuevo-Administracione/guardar
	 * Method: POST
	 */
	public function storeStaffSocial(Request $request){
		$staff            = new StaffSocial;
        $staff->name      = $request->name;
        $staff->url    	  = $request->url;
        $staff->social_id = $request->social_id;
        $staff->staff_id  = $request->staff_id;
        $staff->save();
        return response()->json([
        	'message'	=>'Registro creado exitosamente.'
        ], 200);
	}
	/**
	 * Se redirecciona al formulario para actualizar el Administracione seleccionado
	 * URL : actualizar-Administracione/{id}
	 * Method: GET
	 */
	public function editStaffSocial($id){
		
        $staffSocial 	 = StaffSocial::FindOrFail($id);
        $socials = Social::where('state', 1)->get();
        $staff 	 = Staff::FindOrFail($staffSocial->staff_id);

    	return view('staff.socialEdit', [
    		'staffSocial'			=> $staffSocial,
			'socials'	=> $socials,
			'staff'	=> $staff
    	]);
	}
	/**
	 * Se almacena toda la información del nuevo Administracione con la Administracione
	 * URL : nuevo-Administracione/guardar
	 * Method: POST
	 */
	public function updateStaffSocial(Request $request, $id){
		$staff            = StaffSocial::FindOrFail($id);
        $staff->name      = $request->name;
        $staff->url    	  = $request->url;
        $staff->social_id = $request->social_id;
        $staff->update();
		
        return response()->json([
        	'message'	=>'Registro actualizado exitosamente.'
        ], 200);
	}
    /**
      * Actualiza el estado del Administracione a activo.
      * Tipo: PUT
      * URL: Administracione/activar/{id}
      */
    public function disableStaffSocial(Request $request, $id){
        $staff = StaffSocial::FindOrFail($id);
        $staff->state = $staff->state ? 0 : 1;
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
        $staffDetails = StaffDetail::where('staff_id', $staff_id)->get();
    	return view('staff.detailList',[
			'staff'			=> $staff,
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
		$staff            	 = new StaffDetail;
        $staff->name      	 = $request->name;
        $staff->description  = $request->description;
        $staff->staff_id  	 = $request->staff_id;
		if($request->hasfile('photo')){
            $image_path 	= public_path().'/img_admin/detail_staff/'.$staff->photo;
            \File::delete($image_path);
            $file 			= $request->file('photo');
            $name   		= time()."_".$file->getClientOriginalName();
            $staff->photo 	= $name;
            $file->move(public_path().'/img_admin/detail_staff/',$name);
        }
        $staff->save();
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
		
		$staffDetail = StaffDetail::FindOrFail($id);
        $staff 	 	 = Staff::FindOrFail($staffDetail->staff_id);

    	return view('staff.detailEdit', [
			'staff'			=> $staff,
    		'staffDetail' => $staffDetail,
    	]);
	}
	/**
	 * Actualiza la información
	 * URL : nuevo-detalle/guardar
	 * Method: POST
	 */
	public function updateDetail(Request $request, $id){
		$staff              = StaffDetail::FindOrFail($id);
        $staff->name        = $request->name;
        $staff->description = $request->description;
		if($request->hasfile('photo')){
            $image_path 	= public_path().'/img_admin/detail_staff/'.$staff->photo;
            \File::delete($image_path);
            $file 			= $request->file('photo');
            $name   		= time()."_".$file->getClientOriginalName();
            $staff->photo 	= $name;
            $file->move(public_path().'/img_admin/detail_staff/',$name);
        }
        $staff->update();
		
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
        $staff = StaffDetail::FindOrFail($id);
        $staff->state = $staff->state ? 0 : 1;
        $staff->update();
        return response()->json(['message'=>'Registro actualizado correctamente.'], 200);
    }
    /**
      * Eliminar Detalle a activo.
      * Tipo: DELETE
      * URL: staff-detalle/delete/{id}
      */
    public function deleteDetail($id){
        $staff = StaffDetail::FindOrFail($id);
		
		if(!empty($staff->photo)){
			$image_path 	= public_path().'/img_admin/detail_staff/'.$staff->photo;
			\File::delete($image_path);
		}

        $staff->delete();
        return response()->json(['message'=>'Registro eliminado correctamente.'], 200);
    }
}

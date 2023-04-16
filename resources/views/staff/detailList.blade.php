@extends('layouts.app')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        @include('staff.detail')
        {{-- Contenido de guia --}}
        <div class="content-header row">
            <div class="content-header-left col-md-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-lg-12">
                        <h2 class="content-header-title float-left mb-0" style="color:black;">Vehiculos de apoyo</h2>
                    </div> 
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-right d-md-block">
                                    <a href="{{ route('staff.get') }}">
                                        <button type="button" class="btn btn-danger btn-md waves-effect waves-light"><i class="feather icon-arrow-left"></i> Volver</button>
                                    </a>
                                    <a href="{{ route('staffDetail.create', $staff->codigo) }}">
                                        <button type="button" class="btn btn-success btn-md waves-effect waves-light"><i class="feather icon-plus"></i> Agregar Nuevo</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>

        {{-- Contenido de tabla --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th width="10">COD</th>
                                        <th width="100">Marca</th>
                                        <th width="100">Color</th>
                                        <th width="100">Modelo</th>
                                        <th width="30">Capacidad</th>
                                        <th width="30">Clase</th>
                                        <th width="30">Tipo Vehiculo</th>
                                        <th width="30">Categoria</th>
                                        <th width="30">Llantas</th>
                                        <th width="30">Placa</th>
                                        <th width="20" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($staffDetails as $detail)
                                    <tr>
                                        <td>{{$detail->codigo}}</td>
                                        <td>{{$detail->marca}}</td>
                                        <td>{{$detail->color}}</td>
                                        <td>{{$detail->modelo}}</td>
                                        <td>{{$detail->capacidad}}</td>
                                        <td>{{$detail->clase}}</td>
                                        <td>{{$detail->tipo_vehiculo}}</td>
                                        <td>{{$detail->categoria}}</td>
                                        <td>{{$detail->llantas}}</td>
                                        <td>{{$detail->placa}}</td>
                                        <td class="text-center">
                                            <a href="{{route('staffDetail.edit', $detail->codigo)}}">
                                                <button class="btn btn-icon btn-info btn-sm waves-effect waves-light" type="button" title="Editar">
                                                    <i class="feather icon-edit-2">
                                                    </i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('dev_js')
    <script>
        // Cambiar Estado
        $('body').on('click','.state', function(){
            Swal.fire({
                    title: '¿Estás seguro de actualizar estado?',
                    showCancelButton: true,
                    cancelButtonColor: '#E63233',
                    confirmButtonText: 'Actualizar',
                    cancelButtonText: 'Cancelar',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    heightAuto: false
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url:     "{{ url('/staff-detalle/activar') }}/"+$(this).data('id'),
                        headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                        method:  "PUT",
                        success:function(data){
                            Swal.fire({
                                title: 'Exitoso!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'Aceptar',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                heightAuto: false
                            }).then((result)=>{
                                if(result.value){
                                    location.reload();
                                    return false;
                                }else{
                                    location.reload();
                                    return false;
                                }
                            });
                        },
                        error : function(xhr, status) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Ocurrió un error inesperado, por favor actualice la página e inténtelo nuevamente.',
                                icon: 'error',
                                confirmButtonText: 'Aceptar',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                heightAuto: false
                            });
                        }
                    });
                }
            });
        });
        // Cambiar Estado
        $('body').on('click','.delete', function(){
            Swal.fire({
                    title: '¿Estás seguro de eliminar de forma permanente?',
                    showCancelButton: true,
                    cancelButtonColor: '#E63233',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    heightAuto: false
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url:     "{{ url('/staff-detalle/delete') }}/"+$(this).data('id'),
                        headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                        method:  "PUT",
                        success:function(data){
                            Swal.fire({
                                title: 'Exitoso!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'Aceptar',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                heightAuto: false
                            }).then((result)=>{
                                if(result.value){
                                    location.reload();
                                    return false;
                                }else{
                                    location.reload();
                                    return false;
                                }
                            });
                        },
                        error : function(xhr, status) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Ocurrió un error inesperado, por favor actualice la página e inténtelo nuevamente.',
                                icon: 'error',
                                confirmButtonText: 'Aceptar',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                heightAuto: false
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
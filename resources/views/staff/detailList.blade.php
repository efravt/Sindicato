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
                        <h2 class="content-header-title float-left mb-0" style="color:black;">Detalle de Directorio</h2>
                    </div> 
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-right d-md-block">
                                    <a href="{{ route('staff.get') }}">
                                        <button type="button" class="btn btn-danger btn-md waves-effect waves-light"><i class="feather icon-arrow-left"></i> Volver</button>
                                    </a>
                                    <a href="{{ route('staffDetail.create', $staff->staff_id) }}">
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
        <div class="content-body">
            <section id="wishlist" class="grid-view wishlist-items">

                @foreach($staffDetails as $staffDetail)
                <div class="card ecommerce-card">
                    <div class="card-content">
                        <div class="item-img text-center">
                            <img src="../../../img_admin/detail_staff/{{$staffDetail->photo}}" class="img-fluid" alt="img-placeholder" 
                            style="max-height: 250px;width: auto;">
                        </div>
                        <div class="card-body">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <a href="{{route('staffDetail.edit', $staffDetail->staff_detail_id)}}">
                                        <button class="btn btn-icon btn-info btn-sm waves-effect waves-light" type="button">
                                            <i class="feather icon-edit-2">
                                            </i>
                                        </button>
                                    </a>
                                </div>
                                <div>
                                    <h6 class="item-price">
                                        ID: {{$staffDetail->staff_detail_id}}
                                    </h6>
                                </div>
                            </div>
                            <div class="item-name">
                                {{$staffDetail->name}}
                            </div>
                            <div>
                                <p class="item-description">
                                    {{$staffDetail->description}}
                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-12 mb-1 text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn state waves-effect waves-light btn-{{ $staffDetail->state==1?'danger':'success' }}" data-id="{{ $staffDetail->staff_detail_id }}">
                                            {{ $staffDetail->state==1?'Deshabilitar':'Habilitar' }}
                                        </button>
                                        <button type="button" class="btn delete waves-effect waves-light btn-primary" data-id="{{ $staffDetail->staff_detail_id }}">
                                            Eliminar
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

            </section>

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
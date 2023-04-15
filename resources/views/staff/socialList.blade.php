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
                        <h2 class="content-header-title float-left mb-0" style="color:black;">Redes Sociales</h2>
                    </div> 
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-right d-md-block">
                                    <a href="{{ route('staff.get') }}">
                                        <button type="button" class="btn btn-danger btn-md waves-effect waves-light"><i class="feather icon-arrow-left"></i> Volver</button>
                                    </a>
                                    <a href="{{ route('staffSocial.create', $staff->staff_id) }}">
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

            <!-- Table Hover Animation start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th width="10">ID</th>
                                            <th width="100">Descripción</th>
                                            <th width="100">Ruta</th>
                                            <th width="120" class="text-center">Estado</th>
                                            <th width="100" class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options end -->

        </div>
        
    </div>
</div>
@endsection
@section('dev_js')
    <script>
        //DataTable 
        var table = '';    
        $(document).ready(function(){
            table = $('#dataTable').DataTable({
                responsive: true,
                // scrollY: '400px',
                scrollY: true,
                scrollX : false,
                scrollCollapse : true,
                "language": {
                    "lengthMenu":  "Mostrar "+
                                `
                                <select class="form-control">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                `
                                +" registros por pagina",
                    "zeroRecords": "No existen registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                    "search": "Buscar :",
                    "paginate":{
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "aaSorting": [[ 0, "desc" ]],
                "columnDefs": [
                    {   
                        "className": "text-center", 
                        "targets": [3,4]
                    },
                    {   
                        "targets": [3,4],
                        "width": "10%"
                    },
                    {   
                        "bSortable": false, 
                        "targets": [3,4] 
                    },
                ],
                "ajax"    : "{{ route('staffSocial.getList', $staff->staff_id) }}",
                "columns" : [
                    {data : 'staff_id'},
                    {data : 'name'},
                    {data : 'ruta'},
                    {data : 'state'},
                    {data : 'action'}
                ]
            });
        });
        // Acción para deshabilitar al staffSocial
        $('#dataTable').on('click','.disableStaffSocial', function(){
            $.ajax({
                url:     "{{ url('/staffSocial/activar') }}/"+$(this).data('id'),
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
                            table.ajax.reload();
                        }
                    });
                },
                error : function(xhr, status) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ocurrió un error inesperado, por favor actualice la página e inténtelo nuevamente.',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    });
                }
            });
        });
    </script>
@endsection
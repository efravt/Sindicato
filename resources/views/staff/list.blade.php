@extends('layouts.app')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        {{-- Contenido de guia --}}
        <div class="content-header row">
            <div class="content-header-left col-md-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-lg-12">
                        <h2 class="content-header-title float-left mb-0" style="color:black;">Socios</h2>
                    </div> 
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-right d-md-block">
                                    <a href="{{ route('staff.create') }}">
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
                                            <th width="100">Nombre</th>
                                            <th width="100">Paternal</th>
                                            <th width="100">Maternal</th>
                                            <th width="30">CI</th>
                                            <th width="30">Ingreso</th>
                                            <th width="30">Número Asignado</th>
                                            <th width="50" class="text-center">Estado</th>
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
                        "targets": [7,8]
                    },
                    {   
                        "targets": [7,8],
                        "width": "10%"
                    },
                    {   
                        "bSortable": false, 
                        "targets": [7,8] 
                    },
                ],
                "ajax"    : "{{ route('staff.getList') }}",
                "columns" : [
                    {data : 'codigo'},
                    {data : 'photo'},
                    {data : 'paterno'},
                    {data : 'materno'},
                    {data : 'ci'},
                    {data : 'ingreso'},
                    {data : 'numero'},
                    {data : 'state'},
                    {data : 'action'}
                ]
            });
        });
        // Acción para deshabilitar al staff
        $('#dataTable').on('click','.disableStaff', function(){
            $.ajax({
                url:     "{{ url('/staff/activar') }}/"+$(this).data('codigo'),
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
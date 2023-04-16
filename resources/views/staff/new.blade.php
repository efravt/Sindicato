@extends('layouts.app')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        {{-- Contenido de guia --}}
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0" style="color:black;">Socio</h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-t"><b>Nuevo Socio</b>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>

        {{-- Contenido de tabla --}}
        <div class="content-body">
            <div class="card">
                <div class="card-content">
                    <div class="card-body" style="padding-top: 0px;">
                        <form id="form" action="#" class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <h4 class="card-title border-bottom py-1 mb-0 font-medium-2">Datos Personales</h4>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Nombre:</label>
                                        <input type="text" autocomplete="off" id="nombre" name="nombre" class="form-control" placeholder="Introduzca nombre">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Apellido Paterno:</label>
                                        <input type="text" autocomplete="off" id="paterno" name="paterno" class="form-control" placeholder="Introduzca apellido paterno">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Apellido Materno:</label>
                                        <input type="text" autocomplete="off" id="materno" name="materno" class="form-control" placeholder="Introduzca apellido materno">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">CI:</label>
                                        <input type="text" autocomplete="off" id="ci" name="ci" class="form-control" placeholder="Introduzca cédula de identidad">
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Ingreso:</label>
                                        <input type="text" autocomplete="off" id="ingreso" name="ingreso" class="form-control" placeholder="Introduzca ingreso">
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Numero:</label>
                                        <input type="text" autocomplete="off" id="numero" name="numero" class="form-control" placeholder="Introduzca número de celular">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label class="text-show">Foto:</label>
                                        <input type="file" accept="image/*" id="foto" name="foto" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <h4 class="card-title border-bottom py-1 mb-0 font-medium-2">Vehiculo Principal</h4>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Marca:</label>
                                        <input type="text" autocomplete="off" id="marca" name="marca" class="form-control" placeholder="Introduzca marca">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Color:</label>
                                        <input type="text" autocomplete="off" id="color" name="color" class="form-control" placeholder="Introduzca apellido color">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Modelo:</label>
                                        <input type="text" autocomplete="off" id="modelo" name="modelo" class="form-control" placeholder="Introduzca apellido modelo">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Capacidad:</label>
                                        <input type="text" autocomplete="off" id="capacidad" name="capacidad" class="form-control" placeholder="Introduzca cédula de capacidad">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Clase:</label>
                                        <input type="text" autocomplete="off" id="clase" name="clase" class="form-control" placeholder="Introduzca clase">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Tipo Vehiculo:</label>
                                        <input type="text" autocomplete="off" id="tipo_vehiculo" name="tipo_vehiculo" class="form-control" placeholder="Introduzca número de tipo vehiculo">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Categoria:</label>
                                        <input type="text" autocomplete="off" id="categoria" name="categoria" class="form-control" placeholder="Introduzca número de categoria">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Llantas:</label>
                                        <input type="text" autocomplete="off" id="llantas" name="llantas" class="form-control" placeholder="Introduzca número de llantas">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Placa:</label>
                                        <input type="text" autocomplete="off" id="placa" name="placa" class="form-control" placeholder="Introduzca número de placa">
                                    </div>
                                    <div class="col-12 text-right mt-2 cancel_form">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light save_form" id="progress-bar">
                                            <span class="text-submit">Agregar</span>
                                        </button>
                                        <a href="{{ route('staff.get') }}">
                                            <button type="button" class="btn btn-default mr-1 mb-1">Cancelar</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('dev_js')
    <script>
        {{-- Validación de campos de formulario Login --}}       
        $("#form").validate({
            rules: {
                // Se selecciona la etiqueta según el nombre (name)
                nombre: {
                    required: true,
                    minlength: 3,
                },
                paterno: {
                    required: true,
                    minlength: 3,
                },
                materno: {
                    required: true,
                    minlength: 3,
                },
                ci:{
                    required: true,
                    minlength: 6,
                },
                ingreso:{
                    required: true,
                    minlength: 3,
                },
                numero:{
                    required: true,
                    number: true,
                    minlength: 1,
                },
                marca:{
                    required: true,
                },
                color:{
                    required: true,
                },
                modelo:{
                    required: true,
                },
                capacidad:{
                    required: true,
                },
                clase:{
                    required: true,
                },
                tipo_vehiculo:{
                    required: true,
                },
                categoria:{
                    required: true,
                },
                llantas:{
                    required: true,
                },
                placa:{
                    required: true,
                },
            },
            messages: {
                // Se cambia el texto de ingles a español(personalizado)
                nombre: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 3 caracteres.",
                },
                paterno: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 3 caracteres.",
                },
                materno: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 3 caracteres.",
                },
                ci: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 6 caracteres.",
                },
                ingreso:{
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 3 caracteres.",
                },
                numero:{
                    required: "Este campo es requerido",
                    number: "Por favor, ingrese un número valido.",
                    minlength: "Por favor, ingrese al menos 1 caracteres.",
                },
                marca:{
                    required: "Este campo es requerido",
                },
                color:{
                    required: "Este campo es requerido",
                },
                modelo:{
                    required: "Este campo es requerido",
                },
                capacidad:{
                    required: "Este campo es requerido",
                },
                clase:{
                    required: "Este campo es requerido",
                },
                tipo_vehiculo:{
                    required: "Este campo es requerido",
                },
                categoria:{
                    required: "Este campo es requerido",
                },
                llantas:{
                    required: "Este campo es requerido",
                },
                placa:{
                    required: "Este campo es requerido",
                },
            },
            // Se aplicara el error del campo dentro de un span.
            errorElement : 'span',
            // Almacenar información por medio de la URL generada en Laravel
            submitHandler: function(){
                let formData = new FormData();
                // Datos Personales
                formData.append('nombre', $('#nombre').val());
                formData.append('paterno', $('#paterno').val());
                formData.append('materno', $('#materno').val());
                formData.append('ci', $('#ci').val());
                formData.append('ingreso', $('#ingreso').val());
                formData.append('numero', $('#numero').val());
                formData.append('foto', $('#foto')[0].files[0]);
                // Detalle de Vehiculo Principal
                formData.append('marca', $('#marca').val());
                formData.append('color', $('#color').val());
                formData.append('modelo', $('#modelo').val());
                formData.append('capacidad', $('#capacidad').val());
                formData.append('clase', $('#clase').val());
                formData.append('tipo_vehiculo', $('#tipo_vehiculo').val());
                formData.append('categoria', $('#categoria').val());
                formData.append('llanta', $('#llanta').val());
                formData.append('placa', $('#placa').val());

                $(".text-submit").html('Agregando');
                $(".save_form").attr('disabled','disabled');
                $.ajax({
                    url:     "{{ route('staff.store') }}",
                    headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                    method:  "POST",
                    processData:false,
                    contentType:false,
                    data: formData,
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
                                location.href = "{{ route('staff.get') }}";
                            }
                        });
                    },
                    error : function(xhr, status) {
                        $(".text-submit").html('Agregar');
                        $(".save_form").removeAttr('disabled');
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
                

            },
            // Personalización de clase para los inputs validados
            highlight: function(element) {
               $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
               $(element).removeClass('is-invalid');
           }
        });
    </script>
@endsection
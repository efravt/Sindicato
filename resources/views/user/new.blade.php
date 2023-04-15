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
                        <h2 class="content-header-title float-left mb-0" style="color:black;">Usuarios</h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-t"><a href="{{ route('user.get') }}" style="color:black;">
                                        Lista de Usuarios
                                    </a></li>
                                    <li class="breadcrumb-item text-t"><b>Nuevo Usuario</b>
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
                                        <label class="text-show">Paterno:</label>
                                        <input type="text" autocomplete="off" id="paterno" name="paterno" class="form-control" placeholder="Introduzca nombre">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Materno:</label>
                                        <input type="text" autocomplete="off" id="materno" name="materno" class="form-control" placeholder="Introduzca nombre">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Email:</label>
                                        <input type="text" autocomplete="off" id="email" name="email" class="form-control" placeholder="Introduzca email">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Contraseña:</label>
                                        <input type="password" autocomplete="off" id="password" name="password" class="form-control" placeholder="Introduzca nueva contraseña">
                                    </div>
                                    <div class="col-12 text-right mt-2 cancel_form">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light save_form" id="progress-bar">
                                            <span class="text-submit">Agregar</span>
                                        </button>
                                        <a href="{{ route('user.get') }}">
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
        {{-- Validación de campos --}}       
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
                email:{
                    required: true,
                    email: true,
                },
                password:{
                    required:true,
                    minlength:6
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
                email:{
                    required: "Este campo es requerido",
                    email: "Por favor, introduce una dirección de correo electrónico válida."
                },
                password:{
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 6 caracteres."
                },
            },
            // Se aplicara el error del campo dentro de un span.
            errorElement : 'span',
            // Almacenar información por medio de la URL generada en Laravel
            submitHandler: function(){
                let formData = new FormData();
                formData.append('nombre', $('#nombre').val());
                formData.append('paterno', $('#paterno').val());
                formData.append('materno', $('#materno').val());
                formData.append('email', $('#email').val());
                formData.append('password', $('#password').val());

                $(".text-submit").html('Agregando');
                $(".save_form").attr('disabled','disabled');
                $.ajax({
                    url:     "{{ route('user.store') }}",
                    headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                    method:  "POST",
                    processData:false,
                    contentType:false,
                    data: formData,
                    success:function(data){
                        console.log(data)
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
                                location.href = "{{ route('user.get') }}";
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
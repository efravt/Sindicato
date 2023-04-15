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
                        <h2 class="content-header-title float-left mb-0" style="color:black;">Directiva</h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-t"><b>Actualizar Integrante</b>
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
                                    <input type="text" value="{{ $staff->staff_id }}" id="staff_id" hidden="">
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Nombre:</label>
                                        <input type="text" autocomplete="off" id="name" name="name" class="form-control" placeholder="Introduzca nombre" value="{{ $staff->name }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Apellido Paterno:</label>
                                        <input type="text" autocomplete="off" id="paternal" name="paternal" class="form-control" placeholder="Introduzca apellido paterno" value="{{ $staff->paternal }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Apellido Materno:</label>
                                        <input type="text" autocomplete="off" id="maternal" name="maternal" class="form-control" placeholder="Introduzca apellido materno" value="{{ $staff->maternal }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">CI:</label>
                                        <input type="text" autocomplete="off" id="ci" name="ci" class="form-control" placeholder="Introduzca cédula de identidad" value="{{ $staff->ci }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Email:</label>
                                        <input type="text" autocomplete="off" id="email" name="email" class="form-control" placeholder="Introduzca email" value="{{ $staff->email }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Celular:</label>
                                        <input type="text" autocomplete="off" id="phone" name="phone" class="form-control" placeholder="Introduzca número de celular" value="{{ $staff->phone }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label class="text-show">Teléfono:</label>
                                        <input type="text" autocomplete="off" id="phone1" name="phone1" class="form-control" placeholder="Introduzca número de telefono" value="{{ $staff->phone1 }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">País:</label>
                                        <input type="text" autocomplete="off" id="country" name="country" class="form-control" placeholder="Introduzca Pais" value="{{ $staff->country }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Departamento\Ciudad:</label>
                                        <input type="text" autocomplete="off" id="city" name="city" class="form-control" placeholder="Ejm: La Paz, El Alto" value="{{ $staff->city }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Títulos:</label>
                                        <textarea name="specialty" id="specialty" class="form-control" cols="30" rows="3" placeholder="Ejm: Cirujano Dentista, Doctor en Ciencias ...">{{ $staff->specialty }}</textarea>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Rol:</label>
                                        <input type="text" autocomplete="off" id="rol" name="rol" class="form-control" placeholder="Ingrese rol en la directiva" value="{{ $staff->rol }}">
                                    </div>
                                    
                                    <div class="form-group col-lg-4">
                                        <label class="text-show">Foto:</label>
                                        <input type="file" accept="image/*" id="photo" name="photo" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label class="text-show">Bibliografía:</label>
                                        <textarea name="edit_bibliography" id="edit_bibliography" class="form-control" cols="30" rows="6">{{ $staff->bibliography }}</textarea>
                                    </div>
                                    <div class="col-12 text-right mt-2 cancel_form">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light save_form" id="progress-bar">
                                            <span class="text-submit">Actualizar</span>
                                        </button>
                                        <a href="{{ route('staff.get') }}">
                                            <button type="button" class="btn btn-default mr-1 mb-1 waves-effect">Cancelar</button>
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
                name: {
                    required: true,
                    minlength: 3,
                },
                paternal: {
                    required: true,
                    minlength: 3,
                },
                maternal: {
                    required: true,
                    minlength: 3,
                },
                ci:{
                    required: true,
                    minlength: 6,
                },
                email:{
                    required: true,
                    email: true,
                },
                phone:{
                    required: true,
                    number: true,
                    minlength: 6,
                },
                phone1:{
                    number: true,
                    minlength: 6,
                },
                city: {
                    required: true,
                    minlength: 3,
                },
                country: {
                    required: true,
                    minlength: 3,
                },
                rol:{
                    required: true,
                    minlength: 6,
                },
                specialty:{
                    required: true,
                    minlength: 6,
                },
            },
            messages: {
                // Se cambia el texto de ingles a español(personalizado)
                name: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 3 caracteres.",
                },
                paternal: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 3 caracteres.",
                },
                maternal: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 3 caracteres.",
                },
                ci: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 6 caracteres.",
                },
                email:{
                    required: "Este campo es requerido",
                    email: "Por favor, introduce una dirección de correo electrónico válida."
                },
                phone:{
                    required: "Este campo es requerido",
                    number: "Por favor, ingrese un número valido.",
                    minlength: "Por favor, ingrese al menos 6 caracteres.",
                },
                phone1:{
                    number: "Por favor, ingrese un número valido.",
                    minlength: "Por favor, ingrese al menos 6 caracteres.",
                },
                city: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 3 caracteres.",
                },
                country: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 3 caracteres.",
                },
                rol: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 6 caracteres.",
                },
                specialty: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 6 caracteres.",
                },
            },
            // Se aplicara el error del campo dentro de un span.
            errorElement : 'span',
            // Almacenar información por medio de la URL generada en Laravel
            submitHandler: function(){
                let formData = new FormData();
                formData.append('_method', 'PUT');
                formData.append('name', $('#name').val());
                formData.append('paternal', $('#paternal').val());
                formData.append('maternal', $('#maternal').val());
                formData.append('email', $('#email').val());
                formData.append('ci', $('#ci').val());
                formData.append('phone', $('#phone').val());
                formData.append('phone1', $('#phone1').val());
                formData.append('country', $('#country').val());
                formData.append('city', $('#city').val());
                formData.append('rol', $('#rol').val());
                formData.append('specialty', $('#specialty').val());
                formData.append('bibliography', $('#edit_bibliography').val());
                formData.append('photo', $('#photo')[0].files[0]);

                $(".text-submit").html('Actualizando');
                $(".save_form").attr('disabled','disabled');

                $.ajax({
                    url:     "{{ url('actualizar-staff/guardar') }}/"+$('#staff_id').val(),
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
                        $(".text-submit").html('Actualizar');
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
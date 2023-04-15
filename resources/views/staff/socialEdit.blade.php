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
                        <h2 class="content-header-title float-left mb-0" style="color:black;">Redes Sociales <span class="text-primary"> - [{{$staff->name.' '.$staff->paternal.' '.$staff->maternal}}]</span></h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-t"><b>Actualizar</b>
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
                                        <h4 class="card-title border-bottom py-1 mb-0 font-medium-2">Datos</h4>
                                    </div>
                                    <input type="text" value="{{ $staffSocial->staff_social_id }}" id="staffSocial_id" hidden="">
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Descripción:</label>
                                        <input type="text" autocomplete="off" id="name" name="name" class="form-control" placeholder="Introduzca descripción de Red Social" value="{{ $staffSocial->name }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Link:</label>
                                        <input type="text" autocomplete="off" id="url" name="url" class="form-control" placeholder="Introduzca ruta de Red Social" value="{{ $staffSocial->url }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <span class="required-input">*</span>
                                        <label class="text-show">Social:</label>
                                        <select name="social_id" class="form-control" id="social_id">
                                            <option value="">Seleccionar social</option>
                                            @foreach($socials as $social)
                                                <option value="{{ $social->social_id }}" {{ $social->social_id == $staffSocial->social_id ? 'selected' : '' }}>{{ $social->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        <div class="col-12 text-right mt-2 cancel_form">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light save_form" id="progress-bar">
                                                <span class="text-submit">Actualizar</span>
                                            </button>
                                            <a href="{{ route('staffSocial.get', $staffSocial->staff_id) }}">
                                                <button type="button" class="btn btn-default mr-1 mb-1 waves-effect">Cancelar</button>
                                            </a>
                                        </div>
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
        $("#form").validate({
            rules: {
                // Se selecciona la etiqueta según el nombre (name)
                name: {
                    required: true,
                    minlength: 3,
                },
                url: {
                    required: true,
                    minlength: 3,
                    url: true
                },
                social_id: {
                    required: true
                }
            },
            messages: {
                // Se cambia el texto de ingles a español(personalizado)
                name: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 3 caracteres.",
                },
                url: {
                    required: "Este campo es requerido",
                    minlength: "Por favor, ingrese al menos 3 caracteres.",
                    url:'Por favor, ingrese una URL valida'
                },
                social_id: {
                    required: "Este campo es requerido",
                },
            },
            // Se aplicara el error del campo dentro de un span.
            errorElement : 'span',
            // Almacenar información por medio de la URL generada en Laravel
            submitHandler: function(){
                let formData = new FormData();
                formData.append('_method', 'PUT');
                formData.append('name', $('#name').val());
                formData.append('url', $('#url').val());
                formData.append('social_id', $('#social_id').val());

                $(".text-submit").html('Actualizando');
                $(".save_form").attr('disabled','disabled');

                $.ajax({
                    url:     "{{ url('actualizar-staffSocial/guardar') }}/"+$('#staffSocial_id').val(),
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
                                location.href = "{{ route('staffSocial.get', $staffSocial->staff_id) }}";
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
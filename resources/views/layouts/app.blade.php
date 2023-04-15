<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Sistema de administración de recursos del Sitio WEB IADR.">
    <meta name="keywords" content="admin IADR Bolivia">
    <meta name="author" content="developer">
    <title>IADR - BOLIVIA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="{!! asset('img_admin/icon/iconoIADR.png') !!}">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('img_admin/icon/iconoIADR.png') !!}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/vendors.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/forms/select/select2.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    @if(request()->is('nuevo-staff')|| request()->is('actualizar-staff/*'))
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/quill.bubble.css">
    @endif
    {{-- DataTableResponsive --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/responsive/css/responsive.dataTables.css') }}"/>
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/bootstrap.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/bootstrap-extended.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/colors.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/components.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/themes/dark-layout.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/themes/semi-dark-layout.css') !!}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/core/menu/menu-types/vertical-menu.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/core/colors/palette-gradient.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/pages/app-user.css') !!}">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-ecommerce-shop.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/style.css') !!}">
    <!-- END: Custom CSS-->

    {{-- Uso de Jquery --}}
    <link rel="stylesheet" href="{!! asset('assets/jquery/jquery-ui/jquery-ui.min.css')!!}">
    <script src="{!! asset('assets/jquery/jquery.min.js')!!}"></script>

    {{-- Validación de formulario --}}
        {{-- Extensón para la validacicón de Formularios --}}
        <script src="{!! asset('assets/jquery/jquery.validate.min.js')!!}"></script>
        {{-- Extensión para validar campo de tipo FILE (.pdf .xsls .docs .png) --}}
        <script src="{!! asset('assets/jquery/additional-methods.min.js')!!}"></script>
    {{-- SweetAlert --}}
    <script src="{!! asset('assets/sweetAlert/sweetAlert.js')!!}"></script>
    {{-- Toastr --}}
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/extensions/toastr.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/extensions/toastr.css') !!}">
    
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/loader/load.css') !!}">
    
    <style>
        /****** Scroll ******/
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1; 
        }
         
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #aca2a2; 
            border-radius: 25px;
        }
        
        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #7885dd; 
        }
        ::-webkit-scrollbar:vertical {
            height: 10px;
        }
        ::-webkit-scrollbar:horizontal {
            height: 10px;
        }
    </style>

    @yield('head')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns ecommerce-application navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


    <!-- BEGIN: Header-->
    @include('layouts.navbar')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->

    {{-- Algoritmo de ABM --}}
    @yield('dev_js')
    {{-- Fin de Algoritmo ABM --}}

    <!-- BEGIN: Vendor JS-->
    {{-- Extención Alert Toast JS --}}
    <script src="{!! asset('app-assets/vendors/js/extensions/toastr.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/vendors.min.js') !!}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{!! asset('app-assets/vendors/js/forms/select/select2.full.min.js') !!}"></script>

    @if(request()->is('nuevo-staff')|| request()->is('actualizar-staff/*'))
    <script src="{!! asset('app-assets/vendors/js/editors/quill/katex.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/editors/quill/highlight.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/editors/quill/quill.min.js') !!}"></script>
    @endif
    {{-- DataTable --}}
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    {{-- DataTableResponsive --}}
    <script type="text/javascript" src="{{ asset('assets/DataTables/responsive/js/dataTables.responsive.js') }}"></script>
    
    <script src="../../../app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{!! asset('app-assets/js/core/app-menu.js') !!}"></script>
    <script src="{!! asset('app-assets/js/core/app.js') !!}"></script>
    <script src="{!! asset('app-assets/js/scripts/components.js') !!}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="{!! asset('app-assets/js/scripts/extensions/i18n.js') !!}"></script> --}}
    @if(request()->is('nuevo-staff')|| request()->is('actualizar-staff/*'))
    <script src="../../../app-assets/js/scripts/editors/editor-quill.js"></script>
    @endif
    
    <script src="{!! asset('app-assets/js/scripts/forms/select/form-select2.js') !!}"></script>
    <script src="{!! asset('app-assets/js/scripts/pages/app-user.js') !!}"></script>
    <script src="{!! asset('app-assets/js/scripts/forms/number-input.js') !!}"></script>
    <!-- END: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-ecommerce-shop.js"></script>
    @yield('script')
    <style>
        thead{
            color:black;
        }
        tbody{
            color:black;
        }
        section{
            color:black;
        }
        /*Titulo de inputs*/
        .text-show{
            font-size: 13px;
            padding-bottom: 5px;
            font-weight: bold;
        }
        /*Titulo principal*/
        .text-t{
            color: black;
        }
        /*Color simbolo "Campo Requerido"*/
        .required-input{
            color:red;
            font-weight: bold;
        }
        /*Tamño modal alert*/
        .swal2-modal{
            width:420px;
        }
        #swal2-title{
            font-size: 18px;
        }
        #swal2-content{
            font-size: 15px;
        }
        {{-- Estilo de la etiqueta span de error --}}
        span.error{ 
            color: red; 
            font-size: 1em;
        }
        /*Boton Default*/
        .btn-default{
            border: 2px solid #7c7b7b;
            padding-top: 11px;
            padding-bottom: 11px;
        }
        .btn-default:hover {
            background-color : #ffffff;
            border-color : #6a6a6a;
        }/*Boton Cancel*/
        .cancel_form{
            padding-right: 0px;
        }
        .form-group{    
            margin-bottom: 10px;
        }
        /* Se quita el estilo del cursor */
        .badge-success{
            cursor: default;
        }
    </style>
</body>
<!-- END: Body-->

</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KARDEX-STPM P.A.</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/estilospdfhorizontal.css') }}">

<style>
        body {
        font-family: Arial, sans-serif; 
        font-size: 14px;

        }

        #titulo{
        margin-top:-20;
        padding: 45px;
        }


        #linea {
		  border-top:1.5px solid black;
		  height: 2px;
		  padding: 0;
		}

		#lineaGreen {
		  border-top: 3px solid #519548;
		  height: 2px;
		  padding: 0;
		}

		#lineayellow {
		  border-top: 3px solid #ffea2c ;
		  height: 2px;
		  padding: 0;
		}
 
        #sindicato_icono{
        float: left;
 		margin-top: -7%;
        margin-left: -7%;
        margin-right: 2%;
        }

        #sindicato_icono2{
        float: right;
        margin-top: -12%;
        margin-left: 2%;
        margin-right: -7%;
        /*text-align: justify;*/
        }

        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
        }
 
        #encabezado{
        text-align: center;
        margin-top: -6%;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 11px;
        }
        #tam1{
        margin-bottom:-4%;
        margin-left: 10%;
        margin-right: 20%;
        font-size: 10px;	
        }
 
        #foto{ 
        float: right;
        margin-top: -30%;
        margin-left: 2%;
        margin-right: -4%;

        }
 
        #Csocio{
        margin-top:6;
        padding: 40px;
        border: 1px solid black;
        }

        #Cvehiculo{
        margin-top:6;
        padding: 20px;
        border: 1px solid black;
        }

        #Cvehiculoapoyo{
        margin-top:6;
        padding: 20px;
        border: 1px solid black;
        }

        #firma{
		border-top: 1px solid black;
		height: 2px;
		max-width:130px;
		padding: 0;
		margin: 20px 40 0 auto;

		}

        #posfirma{
        float: right;
        margin-top: 0.5%;
        margin-left: 2%;
        margin-right:30%;
		}

		#alizquierda{
		float: right;
        margin-top: -15%;
        margin-left: 2%;
        margin-right: 18%;
		}

		#contenedor{
			float: right;
			border: 1.5px solid black;
			text-align: center;
			color: black;
			height:35px;
			width:110px;
			border-radius: 10px;
			margin-top: -4%;
        	margin-left: 2%;
        	margin-right: -36%;
		}

		#ppagina{
		text-align: center;
        margin-top: 23%;
        margin-left: 5%;
        margin-right: 5%;
        font-size: 13px;	
		}



</style>	
</head>


<body>
    <header id="titulo"> 
        <p id="sindicato_icono"><img src="{{asset('img_admin/sindicato_icono.jpg')}}" width="120" height="120"></p>
        <p id="encabezado" >KARDEX SERIE A - 23/24</p>

		<p id="tam1" style="text-align: center">SINDICATO TRANSPORTE PESADO MIXTO "PUERTO ACOSTA" <br>
                            PERSONERIA JURIDICA R.S. 226927 R.M. 274/06 R.A. 031/2022<br>
                            AFILIADO A LA FED. DEP.  TRANS. INTERPROVINCIAL DE LA PAZ <br>
                            PROV. CAMACHO – LA PAZ - BOLIVIA</p>


        <p id="sindicato_icono2"><img src="{{asset('img_admin/sindicato_icono2.png')}}" width="160" height="100"></p>
    </header>
		<div id="linea"></div>
		<div id="lineaGreen"></div>
		<div id="lineayellow"></div>
	<header id="Csocio">
		<section>
 			<h6 style="text-align: center">DATOS-SOCIOS PROPIETARIO </h6>     
				<table>                       
            		<thead>
                    	<th><p id=" ">NOMBRE: {{$staff->nombre}}<br>
                            AP PATERNO: {{$staff->paterno}}<br>
                            AP MATERNO: {{$staff->materno}}<br>
                            CEDULA: {{$staff->ci}}<br>
                            INGRESO: {{$staff->ingreso}}<br>
                            NUMERO DE SOCIO: {{$staff->numero}}
                    	</p></th>
            		</thead>
				</table>
		</section>
		<section id="socio2">
			<p id="foto"><img src="img_admin/socio/{{$staff->foto}}" width="120" height="120"></p>
			<b id="posfirma">FIRMA:</b>
			<div id="firma"></div>
		</section>
	</header>

	<header id="Cvehiculo">
		<section>

 			<h6 style="text-align: center">DATOS DEL VEHICULO </h6>     
				<table>                       
            		<thead>
                    	<th><p id=" " >MARCA:&nbsp; {{$vehiculo1->marca}}<br>
                            COLOR: &nbsp; {{$vehiculo1->color}}<br>
                            MODELO: &nbsp; {{$vehiculo1->modelo}}<br>
                            CAPACIDAD: &nbsp; {{$vehiculo1->capacidad}}
                    	</p></th>
            		</thead>
				</table>

				<table id= "alizquierda" >                       
            		<thead>
                    	<th><p id=" " align="left">CLASE:&nbsp; {{$vehiculo1->clase}}<br>
                            TIPO: &nbsp; {{$vehiculo1->tipo}}<br>
                            CATEGORIA: &nbsp; {{$vehiculo1->categoria}} <br>
                            LLANTAS : &nbsp; {{$vehiculo1->llantas}} <br>
                            &nbsp; PLACA : &nbsp;
                    	</p></th>
            		</thead>
				</table>
				<div id="contenedor">
					{{$vehiculo1->placa}}
				</div>
		</section>

	</header>

	@php($count = 1)
	@foreach($vehiculos_apoyo as $va)
		<header id="Cvehiculoapoyo">
			<section>
				<h6 style="text-align: center">DATOS DEL VEHICULO DE APOYO ({{$count++}})</h6>    
					<table>                       
						<thead>
							<th><p id=" ">MARCA: {{$va->marca}}<br>
								COLOR: {{$va->color}} <br>
								MODELO: {{$va->modelo}} <br>
								CAPACIDAD: {{$va->capacidad}}
							</p></th>
						</thead>
					</table>

					<table id= "alizquierda" >                       
						<thead>
							<th><p id=" " align="left">CLASE:&nbsp; {{$va->clase}}<br>
								TIPO: &nbsp; {{$va->tipo}} <br>
								CATEGORIA: &nbsp; {{$va->categoria}} <br>
								LLANTAS : &nbsp; {{$va->llantas}} <br>
								&nbsp; PLACA : &nbsp;
							</p></th>
						</thead>
					</table>

					<div id="contenedor">
						{{$va->placa}}
					</div>
			</section>
		</header>
	@endforeach
	
	<header id="ppagina">

		<p id="encabezado">SELLO Y FIRMA- 23/24</p>

		<h8 style="text-align: center"><Strong>"CAMIONES – BUSES – MINIBUSES – TAXIS"</Strong>
			<br>
		</h8>
		<h7 style="text-align: center">
			EL ALTO - ESCOMA - PUERTO PARAJACHI - VIRUPAYA - JANKO JANKO - TOTORANI Y VICEVERSA
		</h7>

		
	</header>
</body>
</html>
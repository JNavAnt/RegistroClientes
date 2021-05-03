<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Registro Clientes') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--todo: Buscar las versiones mas recientes de jquery y bootstrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/pdf.css" rel="stylesheet">
</head>
<body class="">
    <div class="" >
        <i style="float: left; width: 25%; height: 10%; background-color: #cc6633">Logo</i>
        <div class="float-right" style="margin-left: 35%; width: 65%; height: 10%; background-color: #3366cc;">ATENCION DE SERVICIO</div>
        <br>
    </div>
    <div style="margin: 0; float: right; ">
        <div>Folio</div> 
        <div>Fecha inicial {{$report->entranceDate}}</div> 
        <div>Fecha Final</div> 
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div style="width: 100%;">
        <div style="text-align: center;">DATOS DEL CLIENTE</div>
        <br>
        <div>Nombre del cliente</div>
        <div>Empresa</div>
        <div>Email</div>
        <div>Telefono</div>

        <div>EQUIPO</div>
        <div>Marca</div>
        <div>Modelo</div>
        <div>Numero de serie</div>
        <div>Accesorios</div>

        <div>SERVICIO</div>
        <div>Falla reportada</div>
        <div>Solucion</div>
        <div>Costo de diagnostico</div>
        <div>Costo final</div>
    </div>
    <div>
        Nombre y firma de conformidad del cliente
    </div>
    <div>
        Ingeniero asignado
    </div>
</body>
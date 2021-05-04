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
    <script src="{{ asset('resources/js/app.js') }}" defer></script>
    <!--todo: Buscar las versiones mas recientes de jquery y bootstrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{ asset('resources/css/bootstrap.min.css') }}">
    <!--<link href="resources/css/pdf.css" rel="stylesheet">-->
    <link rel="stylesheet" href="{{ asset('resources/css/pdf.css') }}">
    
</head>
<body >
    <div class="d-flex" >
        <!--"
        
    -->
        <i style="float: left; width: 25%; height: 10%; background-color: #cc6633">Logo</i>
        <div class="title" >ATENCION DE SERVICIO</div>
        <br>
    </div>
    <div style="margin: 0; float: right; ">
        <div>Folio: {{$report->id}}</div> 
        <div>Fecha inicial {{$report->entranceDate}}</div> 
        <div>Fecha Final: {{$report->exitDate}}</div> 
    </div>
    <div style="height: 80px"></div>

    <div style="width: 100%; margin-bottom: 36;">
        <div  class="subtitle">DATOS DEL CLIENTE</div>
        <div style="height: 20px; background-color: #EAEFF5"></div>
        <div class="data-a">Nombre del cliente: {{$report->customer->fullName}}</div>
        <div class="data-b">Empresa: {{$report->customer->business}}</div>
        <div class="data-a">Email: {{$report->customer->email}}</div>
        <div class="data-b">Telefono: {{$report->customer->phone}}</div>
        <br>
        <br>

        <div class="subtitle">EQUIPO</div>
        <div style="height: 20px; background-color: #EAEFF5"></div>
        <div class="data-a">Marca: {{$report->equipmentBrand}}</div>
        <div class="data-b">Modelo: {{$report->equipmentModel}}</div>
        <div class="data-a">Numero de serie: {{$report->equipmentSN}}</div>
        <div class="data-b text-area" >Accesorios: {{$report->equipmentAccesories}}</div>
        <br>
        <br>

        <div class="subtitle">SERVICIO</div>
        <div style="height: 20px; background-color: #EAEFF5"></div>
        <div class="data-a text-area">Falla reportada: {{$report->reportedFail}}</div>
        <div class="data-b text-area">Solucion: {{$report->solution}}</div>
        <div class="data-a">Costo de diagnostico: {{ number_format((float)$report->diagnosticCost, 2, '.', '')}}</div>
        <div class="data-b">Costo final: {{ number_format((float)$report->finalCost, 2, '.', '')}}</div>
        <br>
        <br>

    </div>
    <div >
        <div style="float: left; padding-left: 50px;">
            Nombre y firma de conformidad del cliente
        </div>
        <div style="float: right; padding-right: 80px;">
            Ingeniero asignado
        </div>
    </div>
</body>
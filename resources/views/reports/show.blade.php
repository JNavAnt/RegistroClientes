@extends('layouts.app')


@section('content')
    <div class="row justify-content-between">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalles del reporte</h2>
            </div>
           <div class="d-flex">
                <div class="pull-right mr-5">
                    <a class="btn btn-primary" href="{{ route('customers.index') }}"> Atras</a>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('reports.print', $report->id)}}"> Imprimir</a>
                </div>
           </div>
        </div>
    </div>


    <div class="d-flex">
        <div class="row" >
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cliente:</strong>
                    {{ $report->customer->fullName }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Negocio:</strong>
                    {{ $report->customer->business }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $report->customer->Email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telefono:</strong>
                    {{ $report->customer->phone }}
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Marca:</strong>
                    {{ $report->equipmentBrand }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Modelo:</strong>
                    {{ $report->equipmentModel }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numero de serie:</strong>
                    {{ $report->equipmentSN }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Accesorios:</strong>
                    {{ $report->equipmentAccesories }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Falla reportada:</strong>
                    {{ $report->reportedFail }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Solucion:</strong>
                    {{ $report->solution }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>costo de diagnostico:</strong>
                    {{ $report->diagnosticCost }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo final:</strong>
                    {{ $report->finalCost }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>entranceDate:</strong>
                    {{ $report->entranceDate }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>exitDate:</strong>
                    {{ $report->exitDate }}
                </div>
            </div>

        </div>
    </div>
@endsection
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
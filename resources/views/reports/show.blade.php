@extends('layouts.app')


@section('content')
    <div class="row justify-content-between mb-1">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalles del reporte</h2>
            </div>
           
        </div>
    </div>

    <div class="d-flex p-4 mb-3 bg-light text-dark rounded" style="overflow-x: auto;">
        <div class="row mr-2" style="width: 50%;" >
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group " style="overflow-x: scroll;">
                    <strong>Cliente:</strong>
                    <br>
                    {{ $report->customer->fullName }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group " style="overflow-x: scroll;">
                    <strong>Negocio:</strong>
                    <br>
                    {{ $report->customer->business }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="overflow-x: scroll;">
                    <strong>Email:</strong>
                    <br>
                    {{ $report->customer->email}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group p-1" style="overflow-x: scroll;">
                    <strong>Telefono:</strong>
                    <br>
                    {{ $report->customer->phone }}
                </div>
            </div>
            
        </div>
        <div class="row mr-2" style="width: 70%;">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group " style="overflow-x: scroll;">
                    <strong>Marca:</strong><br>
                    {{ $report->equipmentBrand }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group " style="overflow-x: scroll;">
                    <strong>Modelo:</strong><br>
                    {{ $report->equipmentModel }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="overflow-x: scroll;">
                    <strong>Numero de serie:</strong><br>
                    {{ $report->equipmentSN }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group pb-5" style="overflow-x: scroll;">
                    <strong>Accesorios:</strong><br>
                    {{ $report->equipmentAccesories }}
                </div>
            </div>
        </div>
        <div class="row w-75">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group  " style="overflow-x: scroll;">
                    <strong>Falla reportada:</strong>
                    {{ $report->reportedFail }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group  " style="overflow-x: scroll;">
                    <strong>Solucion:</strong>
                    {{ $report->solution }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12   ">
                <div class="form-group" style="overflow-x: scroll;">
                    <strong>Costo de diagnostico:</strong>
                    {{ $report->diagnosticCost }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group  " style="overflow-x: scroll;">
                    <strong>Costo final:</strong>
                    {{ $report->finalCost }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group " style="overflow-x: scroll;">
                    <strong>entranceDate:</strong>
                    {{ $report->entranceDate }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group " style="overflow-x: scroll;">
                    <strong>exitDate:</strong>
                    {{ $report->exitDate }}
                </div>
            </div>

        </div>
    </div>
    <div class="d-flex  justify-content-center">
        <div class=" mr-5">
            <a class="btn btn-danger mr-4" href="{{ route('reports.index') }}" style="width: 100px; "> Atras</a>
        </div>
        <div class="">
            <a class="btn btn-primary ml-4" href="{{ route('reports.print', $report->id)}}" style="width: 100px;"> Imprimir</a>
        </div>
    </div>
@endsection
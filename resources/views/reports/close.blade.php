@extends('layouts.app')


@section('content')
    <div class="row justify-content-between mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalles del reporte</h2>
            </div>
           
        </div>
    </div>

    @if (count($errors) > 0)
    <script>var message = ""</script>
    @foreach ($errors->all() as $error)
        <script>message += "{{$error}}<br>"</script>
    @endforeach
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            //text: message
            html: message
        })
    </script>
    @endif
    
    <div class="d-flex">
        <div class="row mr-1" style="width: 50%;" >
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cliente:</strong>
                    <br>
                    {{ $report->customer->fullName }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Negocio:</strong>
                    <br>
                    {{ $report->customer->business }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <br>
                    {{ $report->customer->email}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telefono:</strong>
                    <br>
                    {{ $report->customer->phone }}
                </div>
            </div>
            
        </div>
        <div class="row " style="width: 70%;">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Marca:</strong><br>
                    {{ $report->equipmentBrand }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Modelo:</strong><br>
                    {{ $report->equipmentModel }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numero de serie:</strong><br>
                    {{ $report->equipmentSN }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group pb-4">
                    <strong>Accesorios:</strong><br>
                    {{ $report->equipmentAccesories }}
                </div>
            </div>
        </div>
        <div class="row w-75">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group pb-4">
                    <strong>Falla reportada:</strong>
                    {{ $report->reportedFail }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo de diagnostico:</strong>
                    {{ $report->diagnosticCost }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de entrada:</strong>
                    {{ $report->entranceDate }}
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('reports.finish',$report->id) }}" method="POST">
    	@csrf
        @method('POST')
        <div class="container p-0 d-flex mb-1">
            <div class="form-group w-75 mr-3 p-0">
                <strong>Solucion:</strong>
                <textarea class="form-control" style="height:50px" name="solucion" placeholder="Solucion"></textarea>
            </div>
            <div class="form-group w-25 align-self-center">
                <strong>Costo final:</strong>
                <input type="string" name="costoFinal" class="form-control" placeholder="Costo final" value="">
            </div>
        </div>
        <div class="d-flex  justify-content-center">
            <div class=" mr-5">
                <a class="btn btn-primary" href="{{ route('reports.index') }}">Atras</a>
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </form>
@endsection
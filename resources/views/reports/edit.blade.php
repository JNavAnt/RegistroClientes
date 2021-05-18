@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left ">
                <h2>Editar reporte</h2>
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


    <form action="{{ route('reports.update',$report->id) }}" method="POST">
    	@csrf
        @method('PUT')
		<div class="d-flex justify-content-between mb-0">
		    <div class="mr-5 " style="width: 33%">
		        <div class="form-group" style="margin-bottom: 40px;">
		            <strong>Nombre del cliente:</strong>
					<input type="text" name="fullName" class="form-control" placeholder="Customer name" value="{{ $report->customer->fullName }}">
		        </div>
				<div class="form-group" style="margin-bottom: 40px;">
		            <strong>Marca:</strong>
					<input type="text" name="equipmentBrand" class="form-control" placeholder="equipmentBrand" value="{{$report->equipmentBrand}}">
		        </div>
				<div class="form-group" style="margin-bottom: 40px;">
		            <strong>Modelo:</strong>
					<input type="string" name="equipmentModel" class="form-control" placeholder="equipmentModel" value="{{ $report->equipmentModel}}">
		        </div>
				<div class="form-group mb-0">
		            <strong>Numero de serie:</strong>
					<input type="string" name="equipmentSN" class="form-control" placeholder="equipmentSN" value="{{ $report->equipmentSN}}"> 
		        </div>
		    </div>
            <div class="flex-column" style="width: 66%;">
		        <div class="form-group"  style=" margin-bottom: 20px">
		            <strong>Accesorios:</strong>
					<textarea class="form-control" style="height:150px" name="equipmentAccesories" placeholder="equipmentAccesories">{{ $report->equipmentAccesories }}</textarea>
		        </div>
				<div class="form-group align-self-end">
		            <strong>Fallo reportado:</strong>
					<textarea class="form-control" style="height:150px" name="reportedFail" placeholder="reportedFail">{{ $report->reportedFail }}</textarea>
		        </div>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<a class="btn btn-danger mr-4" href="{{ route('reports.index') }}" style="width: 100px; ">Atras</a>
		    <button type="submit" class="btn btn-primary ml-4" style="width: 100px; background-color: #011753">Aceptar</button>
		</div>


    </form>


@endsection
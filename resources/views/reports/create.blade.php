@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Crear reporte</h2>
            </div>
            <div class="pull-right">
                
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


    <!--<form action="{{ route('reports.store') }}" method="POST">-->
	{!! Form::open(array('route' => 'reports.store','method'=>'POST')) !!}
    	@csrf


         <div class="container d-flex justify-content-between">
		    <div class="mr-5" style="width: 33%">
		        <div class="form-group">
		            <strong>Nombre del cliente:</strong>
					{!! Form::text('nombre', null, array('placeholder' => 'Nombre','class' => 'typeahead form-control', 'autocomplete'=>'off')) !!}
					
		        </div>
				<div class="form-group">
		            <strong>Marca:</strong>
					{!! Form::text('marca', null, array('placeholder' => 'Marca','class' => 'form-control')) !!}
		        </div>
				<div class="form-group">
		            <strong>Modelo:</strong>
					{!! Form::text('modelo', null, array('placeholder' => 'Modelo','class' => 'form-control')) !!}
		        </div>
				<div class="form-group">
		            <strong>Numero de serie:</strong>
					{!! Form::text('numeroserie', null, array('placeholder' => 'Numero de serie','class' => 'form-control')) !!}
		        </div>
		        <div class="form-group">
		            <strong>Costo de diagnostico:</strong>
					{!! Form::text('costodagnostico', null, array('placeholder' => 'Costo de diagnostico','class' => 'form-control')) !!}
		        </div>
		    </div>
            <div class="flex-column d-flex" style="width: 66%;">
		        <div class="form-group">
		            <strong>Accesorios:</strong>
					{!! Form::textArea('accesorios', null, array('placeholder' => 'Accesorios','class' => 'form-control', 'rows' => 5)) !!}
		        </div>
				<div class="form-group mt-auto">
		            <strong>Fallo reportado:</strong>
					{!! Form::textArea('fallo', null, array('placeholder' => 'Fallo reportado','class' => 'form-control', 'rows' => 5)) !!}
		        </div>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<a class="btn btn-danger mr-4" href="{{ route('reports.index') }}" style="width: 100px; ">Atras</a>
		    <button type="submit" class="btn btn-primary ml-4" style="width: 100px;">Aceptar</button>
		</div>

	{!! Form::close() !!}
    <!--</form>-->


@endsection
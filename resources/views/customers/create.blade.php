@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crear cliente</h2>
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


    <form action="{{ route('customers.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nombre completo:</strong>
		            <input type="text" name="nombre" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Negocio:</strong>
		            <input type="text" name="negocio" class="form-control" placeholder="Negocio">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Email:</strong>
		            <input type="email" name="email" class="form-control" placeholder="Email">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Telefono:</strong>
		            <input type="text" name="telefono" class="form-control" placeholder="Telefono">
		        </div>
		    </div>
            
            
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<a class="btn btn-primary" href="{{ route('customers.index') }}">Atras</a>
		        <button type="submit" class="btn btn-primary">Aceptar</button>
		    </div>
		</div>


    </form>


@endsection
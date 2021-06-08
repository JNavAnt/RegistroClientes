@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Editar cliente</h2>
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
            html: message
        })
    </script>
    @endif


    <form class="m-auto " action="{{ route('customers.update',$customer->id) }}" method="POST">
    	@csrf
        @method('PUT')
         <div class="row w-75 m-auto">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nombre completo:</strong>
		            <input type="text" name="fullName" value="{{ $customer->fullName }}" class="form-control" placeholder="Nombre completo">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Negocio:</strong>
                    <input type="text" name="business" value="{{ $customer->business }}" class="form-control" placeholder="Negocio">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Email:</strong>
                    <input type="email" name="email" value="{{ $customer->email }}" class="form-control" placeholder="Email">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
		        <div class="form-group">
		            <strong>Telefono:</strong>
                    <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" placeholder="Telefono">
		        </div>
		    </div>
		    
		</div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-danger m-3" href="{{ route('customers.index') }}" style="width: 100px; "> Atras</a>
		        <button type="submit" class="btn btn-primary m-3" style="width: 100px;">Aceptar</button>
		    </div>
        </div>


    </form>


@endsection
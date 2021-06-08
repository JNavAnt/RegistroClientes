@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4 ">
        <div class="pull-left">
            <h2>Editar usuario</h2>
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
            html: message
        })
    </script>
@endif


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="container d-flex justify-content-around mb-3">
    <div class="row w-50 mr-4 ml-auto">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contraseña:</strong>
                {!! Form::password('contraseña', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirmar contraseña:</strong>
                {!! Form::password('confirmar-contraseña', array('placeholder' => 'Confirmar contraseña','class' => 'form-control')) !!}
            </div>
        </div>
        
    </div>
    <div class="row w-50 h-100 ml-auto mr-auto">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rol:</strong>
                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
        
    </div>
</div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-danger mr-4" href="{{ route('users.index') }}" style="width: 100px;"> Atras</a>
        <button type="submit" class="btn btn-primary ml-4" style="width: 100px;">Aceptar</button>

    </div>
{!! Form::close() !!}

@endsection
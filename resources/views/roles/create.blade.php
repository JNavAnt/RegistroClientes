@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear rol</h2>
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


{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {!! Form::text('nombre', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permisos:</strong>
            <br/>
            
            <table class="">
                @foreach($permission->chunk(4) as $chunkedValue)
                    <tr class="mr-3 ">
                        @foreach($chunkedValue as $value)
                            <td 
                                class=""><label>{{ Form::checkbox('permiso[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            </td>
                            
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Atras</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>
{!! Form::close() !!}


@endsection
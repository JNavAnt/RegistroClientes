@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2>Editar rol</h2>
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


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
        <div class="form-group">
            <strong>Nombre:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
        <div class="form-group">
            <strong>Permisos:</strong>
            <br/>
            <table class="">
                @foreach($permission->chunk(4) as $chunkedValue)
                    <tr class="mr-3 ">
                        @foreach($chunkedValue as $value)
                            <td class="">                
                                <label>{{ Form::checkbox('permisos[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            </td>
                            
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-danger mr-4" href="{{ route('roles.index') }}" style="width: 100px; "> Atras</a>
        <button type="submit" class="btn btn-primary ml-4" style="width: 100px; background-color: #011753">Aceptar</button>
    </div>
</div>
{!! Form::close() !!}


@endsection
@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left ">
            <h2 class="mb-3">Administrar roles</h2>
        </div>
        <div class="pull-right">
        @can('Crear rol')
            <a class="btn btn-success mb-4" href="{{ route('roles.create') }}"> Crear rol</a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
  <script>
      Swal.fire({
                icon: 'success',
                title: 'Operacion exitosa',
                text: "{{$message}}"
            })
  </script>
@endif


<table class="table table-bordered bg-light text-dark w-75 m-auto">
  <tr class="text-center">
     <th width="10%">No</th>
     <th>Nombre</th>
     <th width="280px">Opciones</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr >
        <td class="text-center align-middle">{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td class="text-center align-middle">
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Mostrar</a>
            @can('Editar rol')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}" style="background-color: #011753;">Editar</a>
            @endcan
            @can('Borrar rol')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}


@endsection
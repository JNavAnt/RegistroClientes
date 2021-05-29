@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left ">
            <h2 class="mb-3">Administrar roles</h2>
        </div>
        
        <div class="d-flex justify-content-between">
            <div class="pull-right">
            @can('Crear rol')
                <a class="btn btn-success mb-4 mr-2" href="{{ route('roles.create') }}"> Crear rol</a>
            @endcan
            </div>
            <div class="">
                <form action="{{ route('roles.index') }}" method="GET" role="search">
                    <div class="input-group">
                        <span class="input-group-btn mr-2">
                            <button class="btn btn-info" type="submit" title="Search users">
                                <span class="fas fa-search">Buscar</span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search users" id="term">
                        <!--<a href="{{ route('roles.index') }}" >
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt">Actualizar</span>
                                </button>
                          </span>
                        </a>-->
                      </div>
                </form>
            </div>
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


<div style="overflow-x:auto;"> 
    <table class="table table-bordered bg-light text-dark w-75 m-auto">
    <tr class="text-center">
        <th width="10%">No</th>
        <th>Nombre</th>
        <th width="300px">Opciones</th>
    </tr>
        @foreach ($roles as $key => $role)
        <tr >
            <td class="text-center align-middle">{{ ++$i }}</td>
            <td class="text-center align-middle">{{ $role->name }}</td>
            <td class="text-center align-middle">
                <a class="btn btn-info text-center pr-0 pl-0 m-1" href="{{ route('roles.show',$role->id) }}" style="width: 75px;">Mostrar</a>
                @can('Editar rol')
                    <a class="btn btn-primary m-1" href="{{ route('roles.edit',$role->id) }}" style="width: 75px;">Editar</a>
                @endcan
                @can('Borrar rol')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger m-1' , 'style' => 'width: 75px']) !!}
                    {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </table>
</div>


{!! $roles->render() !!}


@endsection
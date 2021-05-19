@extends('layouts.app')


@section('content')
<div class="row mb-4">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2>Administrar usuario</h2>
        </div>
          <div class="d-flex justify-content-between">
              <div class="pull-right">
                @can('Crear usuario')
                  <a class="btn btn-success" href="{{ route('users.create') }}"> Crear usuario</a>
                @endcan
              </div>
              <div class="">
                  <form action="{{ route('users.index') }}" method="GET" role="search">
                      <div class="input-group">
                        <span class="input-group-btn mr-2">
                          <button class="btn btn-info" type="submit" title="Search users">
                            <span class="fas fa-search">Buscar</span>
                          </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search users" id="term">
                        <a href="{{ route('users.index') }}" >
                          <span class="input-group-btn">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                              <span class="fas fa-sync-alt">Actualizar</span>
                            </button>
                          </span>
                        </a>
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


<table class="table table-bordered bg-light text-dark ">
 <tr class="text-center">
   <th width="10%">No</th>
   <th width="33%">Nombre</th>
   <th width="33%">Email</th>
   <th width="7%">Roles</th>
   <th width="15%">Opciones</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr >
    <td class="text-center align-middle">{{ ++$i }}</td>
    <td class="align-middle">{{ $user->name }}</td>
    <td class="align-middle">{{ $user->email }}</td>
    <td class="text-center align-middle">
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td class="text-center">
       <!--<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Mostrar</a>-->
      @can('Editar usuario')
       <a class="btn btn-primary" style="background-color: #011753;" href="{{ route('users.edit',$user->id) }}">Editar</a>
      @endcan
      @can('Borrar usuario')
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      @endcan
        
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection
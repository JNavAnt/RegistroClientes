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
                  <a class="btn btn-success create mr-2" href="{{ route('users.create') }}" > Crear usuario</a>
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
                        <input type="text" class="form-control" name="term" placeholder="Search users" id="term">
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
  <table class="table table-bordered bg-light text-dark ">
  <tr class="text-center">
    <th width="">No</th>
    <th width="">Nombre</th>
    <th width="">Email</th>
    <th width="">Roles</th>
    <th width="200px">Opciones</th>
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
        @can('Editar usuario')
        <a class="btn btn-primary m-1" href="{{ route('users.edit',$user->id) }}" style="width: 75px;">Editar</a>
        @endcan
        @can('Borrar usuario')
          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Borrar', ['class' => 'btn btn-danger m-1', 'style' => 'width: 75px']) !!}
          {!! Form::close() !!}
        @endcan
          
      </td>
    </tr>
  @endforeach
  </table>
</div>


{!! $data->render() !!}

@endsection
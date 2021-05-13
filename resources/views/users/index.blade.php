@extends('layouts.app')


@section('content')
<div class="row mb-4">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Administrar usuario</h2>
        </div>
        <div class="pull-right">
          @can('Crear usuario')
            <a class="btn btn-success" href="{{ route('users.create') }}"> Crear usuario</a>
          @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Nombre</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Opciones</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <!--<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Mostrar</a>-->
      @can('Editar usuario')
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
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
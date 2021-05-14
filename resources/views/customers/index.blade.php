@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Clientes</h2>
            </div>
            <div class="pull-right">
                @can('Crear cliente')
                <a class="btn btn-success mb-4" href="{{ route('customers.create') }}"> Crear cliente</a>
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


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Negocio</th>
            <th>Email</th>
            <th>Telefono</th>
            <th width="180px">Action</th>
        </tr>
	    @foreach ($customers as $customer)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $customer->fullName }}</td>
	        <td>{{ $customer->business }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
	        <td>
                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                    <!--<a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Mostrar</a>-->
                    @can('Editar cliente')
                        <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('Borrar cliente')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $customers->links() !!}
@endsection
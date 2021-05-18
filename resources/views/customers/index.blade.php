@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Administrar clientes</h2>
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


    <table class="table table-bordered bg-light text-dark ">
        <tr class="text-center">
            <th width="10%">No</th>
            <th>Nombre</th>
            <th>Negocio</th>
            <th>Email</th>
            <th>Telefono</th>
            <th width="180px">Action</th>
        </tr>
	    @foreach ($customers as $customer)
	    <tr>
	        <td class="text-center align-middle">{{ ++$i }}</td>
	        <td class="align-middle">{{ $customer->fullName }}</td>
	        <td class="align-middle">{{ $customer->business }}</td>
            <td class="align-middle">{{ $customer->email }}</td>
            <td class="align-middle">{{ $customer->phone }}</td>
	        <td class="text-center align-middle">
                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                    <!--<a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Mostrar</a>-->
                    @can('Editar cliente')
                        <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}" style="background-color: #011753;">Editar</a>
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
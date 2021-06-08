@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Administrar clientes</h2>
            </div>
            <div class="d-flex justify-content-between">
                <div class="pull-right">
                    @can('Crear cliente')
                    <a class="btn btn-success mb-4 mr-2" href="{{ route('customers.create') }}"> Crear cliente</a>
                    @endcan
                </div>
                <div class="">
                    <form action="{{ route('customers.index') }}" method="GET" role="search">
                        <div class="input-group">
                            <span class="input-group-btn mr-2">
                                <button class="btn btn-info" type="submit" title="Search customers">
                                    <span class="fas fa-search">Buscar</span>
                                </button>
                            </span>
                            <input type="text" class="form-control" name="term" placeholder="Search customers" id="term">
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
    @if ($message = Session::get('error'))
    <script>
        Swal.fire({
                    icon: 'error',
                    title: 'Ocurrio un',
                    text: "{{$message}}"
                })
    </script>
    @endif
    
    <div style="overflow-x:auto;">
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
                        @can('Editar cliente')
                            <a class="btn btn-primary my-1" href="{{ route('customers.edit',$customer->id) }}" style="width: 75px">Editar</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('Borrar cliente')
                            <button type="submit" class="btn btn-danger my-1" style="width: 75px">Borrar</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    


    {!! $customers->links() !!}
@endsection
@extends('layouts.app')


@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Administrar reportes</h2>
            </div>
            <div class="pull-right">
                @can('Crear reporte')
                <a class="btn btn-success" href="{{ route('reports.create') }}">Crear reporte</a>
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

    <table class="table table-bordered bg-light text-dark">
        <tr class="text-center">
            <th width = "10%">No</th>
            <th>Cliente</th>
            <th width = "11%">Marca</th>
            <th width = "10%">Modelo</th>
            <th width = "10%">S/N</th>
            <th width = "14%" >Fecha de entrada</th>
            <th width = "7%" >Estado</th>
            <th width="190">Opciones</th>
        </tr>
	    @foreach ($reports as $report)
	    <tr>
	        <td class="text-center align-middle">{{ ++$i }}</td>
	        <td class=" align-middle">{{ $report->customer->fullName }}</td>
	        <td class=" align-middle">{{ $report->equipmentBrand }}</td>
            <td class=" align-middle">{{ $report->equipmentModel }}</td>
            <td class=" align-middle">{{ $report->equipmentSN }}</td>
            <td class="text-center align-middle">{{ $report->entranceDate}}</td>
            <td class="text-center align-middle">{{ $report->state->state}}</td>
	        <td>
                <form  class="text-center" action="{{ route('reports.destroy',$report->id) }}" method="POST">
                    <div class="row mb-2">
                        <div class="col w-50 pr-1"><a class="btn btn-info text-center pr-0 pl-0" href="{{ route('reports.show',$report->id) }}" style="width: 70px;">Mostrar</a></div>
                        <div class="col w-50 pl-1">
                            @can('Editar reporte')
                            @if($report->state->id != 3)
                                <a class="btn btn-primary text-center pr-0 pl-0" href="{{ route('reports.edit', $report->id) }}" style="width: 70px;">Editar</a>
                            @endif
                            @endcan
                        </div>
                    </div>
                    <div class="row">
                        <div class="col w-50 pr-1">
                            @can('Editar reporte')
                            @if($report->state->id != 3)
                                <a class="btn btn-primary pr-0 pl-0" href="{{ route('reports.close', $report->id) }}" style="width: 70px;">Cerrar</a>
                            @endif
                            @endcan
                        </div>
                        <div class="col w-50 pl-1">
                            @csrf
                            @method('DELETE')
                            @can('Borrar reporte')
                            @if($report->state->id != 3)
                                <button type="submit" class="btn btn-danger pr-0 pl-0" style="width: 70px;">Borrar</button>
                            @endif
                            @endcan
                        </div>
                    </div>
                    
                    

                    
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $reports->links() !!}


@endsection
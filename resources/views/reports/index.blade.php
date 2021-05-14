@extends('layouts.app')


@section('content')
    <div class="row mb-5">
        <div class="col-lg-12 margin-tb">
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

    <table class="table table-bordered">
        <tr>
            <th width = "5%">No</th>
            <th>Cliente</th>
            <th width = "11%">Marca</th>
            <th width = "10%">Modelo</th>
            <th width = "10%">S/N</th>
            <th width = "14%" >Fecha de entrada</th>
            <th width = "7%" >Estado</th>
            <th width="210px">Opciones</th>
        </tr>
	    @foreach ($reports as $report)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $report->customer->fullName }}</td>
	        <td>{{ $report->equipmentBrand }}</td>
            <td>{{ $report->equipmentModel }}</td>
            <td>{{ $report->equipmentSN }}</td>
            <td>{{ $report->entranceDate}}</td>
            <td>{{ $report->state->state}}</td>
	        <td>
                <form  class="" action="{{ route('reports.destroy',$report->id) }}" method="POST">
                    <div class="row mb-2">
                        <div class="col w-50 "><a class="btn btn-info w-100" href="{{ route('reports.show',$report->id) }}">Mostrar</a></div>
                        <div class="col w-50">
                            @can('Editar reporte')
                            @if($report->state->id != 3)
                                <a class="btn btn-primary w-100" href="{{ route('reports.edit', $report->id) }}">Editar</a>
                            @endif
                            @endcan
                        </div>
                    </div>
                    <div class="row">
                        <div class="col w-50">
                            @can('Editar reporte')
                            @if($report->state->id != 3)
                                <a class="btn btn-primary w-100" href="{{ route('reports.close', $report->id) }}">Cerrar</a>
                            @endif
                            @endcan
                        </div>
                        <div class="col w-50">
                            @csrf
                            @method('DELETE')
                            @can('Borrar reporte')
                            @if($report->state->id != 3)
                                <button type="submit " class="btn btn-danger w-100">Borrar</button>
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
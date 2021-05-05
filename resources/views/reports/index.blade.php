@extends('layouts.app')


@section('content')
    <div class="row">
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
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Cliente</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Numero de serie</th>
            <th>Fecha de entrada</th>
            <th>Estado</th>
            <th width="260px">Opciones</th>
        </tr>
	    @foreach ($reports as $report)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $report->customer->fullName }}</td>
	        <td>{{ $report->equipmentBrand }}</td>
            <td>{{ $report->equipmentModel }}</td>
            <td>{{ $report->equipmentSN }}</td>
            <td>{{ $report->entranceDate}}</td>
            <td>{{ $report->state->id}}</td>
	        <td>
                <form action="{{ route('reports.destroy',$report->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('reports.show',$report->id) }}">Mostrar</a>
                    @can('Editar reporte')
                    <a class="btn btn-primary" href="{{ route('reports.edit',$report->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('Borrar reporte')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $reports->links() !!}


@endsection
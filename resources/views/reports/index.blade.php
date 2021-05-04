@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Reports</h2>
            </div>
            <div class="pull-right">
                @can('Crear reporte')
                <a class="btn btn-success" href="{{ route('reports.create') }}"> Create New Report</a>
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
            <th>Customer</th>
            <th>equipmentBrand</th>
            <th>equipmentModel</th>
            <th>equipmentSN</th>
            <th>entranceDate</th>
            <th>state</th>
            <th width="280px">Action</th>
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
                    <a class="btn btn-info" href="{{ route('reports.show',$report->id) }}">Show</a>
                    @can('Editar reporte')
                    <a class="btn btn-primary" href="{{ route('reports.edit',$report->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('Borrar reporte')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $reports->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
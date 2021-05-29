@extends('layouts.app')


@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Administrar reportes</h2>
            </div>
            <div class="d-flex justify-between">
                <div class="pull-right">
                    @can('Crear reporte')
                    <a class="btn btn-success mr-3" href="{{ route('reports.create') }}">Crear reporte</a>
                    @endcan
                </div>
                <div class="">
                    <form action="{{ route('reports.index') }}" method="GET" role="search">
                        <div class="input-group">
                            <span class="input-group-btn mr-2">
                                <button class="btn btn-info" type="submit" title="Search reports">
                                    <span class="fas fa-search">Buscar</span>
                                </button>
                            </span>
                            <input type="text" class="form-control " name="term" placeholder="Search reports" id="term">
                            <!--<a href="{{ route('reports.index') }}" >
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" title="Refresh page">
                                        <span class="fas fa-sync-alt">Actualizar</span>
                                    </button>
                            </span>
                            </a>-->
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

    <div style="overflow-x: auto;">
        <table class="table table-bordered bg-light text-dark">
            <tr class="text-center">
                <th width = "10%">No</th>
                <th>Cliente</th>
                <th width = "11%">Marca</th>
                <th width = "10%">Modelo</th>
                <th width = "10%">S/N</th>
                <th width = "14%" >Fecha de entrada</th>
                <th width = "7%" >Estado</th>
                <th width="180px">Opciones</th>
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
                        <div class="row ">
                            <div class="col p-1"><a class="btn btn-info text-center" href="{{ route('reports.show',$report->id) }}" style="width: 75px;">Mostrar</a></div>
                            <div class="col p-1">
                                @can('Editar reporte')
                                @if($report->state->id != 3)
                                    <a class="btn btn-primary text-center" href="{{ route('reports.edit', $report->id) }}" style="width: 75px;">Editar</a>
                                @endif
                                @endcan
                            </div>
                        </div>
                        <div class="row">
                            <div class="col  p-1">
                                @can('Editar reporte')
                                @if($report->state->id != 3)
                                    <a class="btn btn-primary" href="{{ route('reports.close', $report->id) }}" style="width: 75px;">Cerrar</a>
                                @endif
                                @endcan
                            </div>
                            <div class="col p-1">
                                @csrf
                                @method('DELETE')
                                @can('Borrar reporte')
                                @if($report->state->id != 3)
                                    <button type="submit" class="btn btn-danger" style="width: 75px;">Borrar</button>
                                @endif
                                @endcan
                            </div>
                        </div>
                        
                        

                        
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>


    {!! $reports->links() !!}


@endsection
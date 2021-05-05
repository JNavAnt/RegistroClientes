@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Detalles de rol</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Atras</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permisos:</strong>
            @if(!empty($rolePermissions))
                <table>
                    @foreach($rolePermissions->chunk(4) as $chunkedValue)
                        <tr class="mr-3 ">
                            @foreach($chunkedValue as $value)
                                <td class="">   
                                    <label class="label label-success">{{ $value->name }}</label>             
                                </td>
                                
                            @endforeach
                        </tr>
                    @endforeach
                </table>
                
                <!--@foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach-->
            @endif
        </div>
    </div>
</div>
@endsection
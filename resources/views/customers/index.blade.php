@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Customers</h2>
            </div>
            <div class="pull-right">
                @can('customer-create')
                <a class="btn btn-success" href="{{ route('customers.create') }}"> Create New Customer</a>
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
            <th>Name</th>
            <th>Business</th>
            <th>Email</th>
            <th>Phone</th>
            <th width="280px">Action</th>
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
                    <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Show</a>
                    @can('customer-edit')
                        <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('customer-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $customers->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
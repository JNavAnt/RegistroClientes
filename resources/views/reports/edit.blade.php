@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Report</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('reports.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('reports.update',$report->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
         	<div class="col-xs-12 col-sm-12 col-md-12">
		 		<div class="form-group">
		            <strong>Customer name:</strong>
		            <input type="text" name="fullName" class="form-control" placeholder="Customer name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>equipmentBrand:</strong>
		            <input type="text" name="equipmentBrand" class="form-control" placeholder="equipmentBrand">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>equipmentModel:</strong>
		            <input type="string" name="equipmentModel" class="form-control" placeholder="equipmentModel">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>equipmentSN:</strong>
		            <input type="string" name="equipmentSN" class="form-control" placeholder="equipmentSN">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>equipmentAccesories:</strong>
		            <textarea class="form-control" style="height:150px" name="equipmentAccesories" placeholder="equipmentAccesories">{{ $report->equipmentAccesories }}</textarea>
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>reportedFail:</strong>
		            <textarea class="form-control" style="height:150px" name="reportedFail" placeholder="reportedFail">{{ $report->reportedFail }}</textarea>
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>solution:</strong>
		            <textarea class="form-control" style="height:150px" name="solution" placeholder="solution">{{ $report->reportedFail }}</textarea>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>diagnosticCost:</strong>
		            <input type="string" name="diagnosticCost" class="form-control" placeholder="diagnosticCost">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>finalCost:</strong>
		            <input type="string" name="finalCost" class="form-control" placeholder="finalCost">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>entranceDate:</strong>
		            <input type="datetime" name="entranceDate" class="form-control" placeholder="entranceDate">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>exitDate:</strong>
		            <input type="datetime" name="exitDate" class="form-control" placeholder="exitDate">
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
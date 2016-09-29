@extends('layouts.app')

@section('content')


	<div class="col-md-8  col-md-offset-2">

	<div class = "panel panel-default">
		<div class="panel-heading">Event Details</div>
		    <div class="panel-body">
		       <div class="form-group">
		        <p class="col-md-12 control-label">Event Name: <b>{{$Events->evt_name}}</b></p>
      		  </div>
      		   <div class="form-group">
		        <p class="col-md-12 control-label">Event Description: <b>{{$Events->evt_desc}}</b></p>
      		  </div>
      		   <div class="form-group">
		        <p class="col-md-12 control-label">Event Date: <b>{{$Events->evt_date}}</b></p>
      		  </div>
      		   <div class="form-group">
		       <a href="{{ route('event.index')}}" class="btn btn-primary" style="margin-left:15px;">Back</a>
      		  </div>
      		   
			</div>
	</div>



	</div>


	
@endsection
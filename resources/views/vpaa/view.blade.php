@extends('layouts.app')

@section('content')
<style type="text/css">
#pending{
	color: white;
	border: 2px solid orange;
	border-radius: 25px;
	padding: 4px;
	background-color: orange;
}
#approve{
	color: white;
	border: 2px solid green;
	border-radius: 25px;
	padding: 4px;
	background-color: green;
}
#disapproved{
	color: white;
	border: 2px solid red;
	border-radius: 25px;
	padding: 4px;
	background-color: red;
}
.well{
	padding: 5px;
	margin-left: 10px;
	padding-left: 20px;
	padding-top: 10px;
	background-color: white;
}
#canceled{
	color: white;
	border: 2px solid #1d6987;
	border-radius: 25px;
	padding: 4px;
	background-color: #1d6987;	
}			
</style>

<div class="container">
<div class="row" style="margin-top:80px; margin-right:10px; margin-left:10px;">
@include('message')
</div>

            <div class="page-title">
              <div class="title_left">
                <h3>{{ $event->title }} <small>booked by {{ $event->name }}</small></h3>
              </div>
	
      
              <div class="title_right">
               <div class="col-xs-12 form-group pull-right top_search">
         @if($event->status == "dean")
		<h5 style="float:right; margin-right:30px;">Status: <b id="approve">Approved by Dean</b></h5>
		@endif
		@if($event->status == 'approved')
		<h5 style="float:right; margin-right:30px;">Status: <b id="approve">Approved</b></h5>
		@endif
		@if($event->status == "pending")
		<h5 style="float:right; margin-right:30px;">Status: <b id="pending">Pending </b></h5>
		@endif
		@if($event->status == "canceled")
		<h5 style="float:right; margin-right:30px;">Status: <b id="canceled">Canceled</b></h5>
		@endif
		@if($event->status == "Disapproved" )
		<h5 style="float:right; margin-right:30px;">Status: <b id="disapproved">Disapproved</b></h5>
		@endif

                </div>
              </div>
            </div>

<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-success alert-dismissible" role="alert">
			<h4><span class="fa fa-envelope-open"></span> Letter:</h4>
			<p>{{$letter->letter}}</p>
			<p></p><br>
		@if($letter->status == 'pending')
		<div class="row">
		<div class="col-lg-1">
			<form action="{{url('approveletter/'. $letter->id)}}" method="POST" >
			{{ csrf_field() }} 
			<button type="submit" class="btn btn-default">Approve</button>
			</form>
		</div>
		<div class="col-lg-1">
			<form action="{{url('disapproveletter/'.$letter->id)}}" method="POST">
			{{ csrf_field() }} 
			<button class="btn btn-danger">Disapprove</button>
			</form>
		</div>
		</div>
		@elseif($letter->status == 'approved')
		<h4 style="color:green;"><span class="glyphicon glyphicon-ok-circle" ></span> Approved!</h4>
		@elseif($letter->status == 'disapproved')
		<h4 style="color:red;"><span class="glyphicon glyphicon-remove-circle"></span> Disapproved!</h4>		
		@endif
		</div>
	</div>
</div>

<div class="row">

</div>
<hr>
<div class="row">
	<div class="col-lg-6">

		<p style="margin-left:10px;">Type of Activity: <b>{{ $event->type_activity }}</b></p>
		
		<div class="well">
			<p>Number of Participants: <b>{{ $event->participants }}</b></p>
		</div>
		<div class="well">
			<p>Venue: <b>{{ $event->venue }}</b></p>
		</div>
		<div class="well">
			<p>Activity:<b>
				@if(!empty($event->gym))
				IHM GYM usage,
				@endif
				@if(!empty($event->sales))
				Involving sales of products and services,
				@endif
				@if(!empty($event->film))
				Film Showing/Stage Play,
				@endif
				</b>
			</p>
		</div>
		<div class="well">
			<p>Time:<b> 
				{{ date("g:ia\, jS M Y", strtotime($event->start_time)) . ' until ' . date("g:ia\, jS M Y", strtotime($event->end_time)) }}
			</b></p>
		</div>
		<div class="well">
			<p>Duration: <b> {{ $duration }}</b></p>
		</div>

		
	</div>
</div>
</div>
@endsection

@section('js')

@endsection


			
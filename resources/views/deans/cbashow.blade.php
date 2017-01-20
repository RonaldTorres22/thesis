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
                <h3>{{ $event->title }} <small>booked by {{ $event->user->name }}</small></h3>
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

</div>
<hr>
<div class="row">
	<div class="col-lg-6">

		<div class="row">
			<div class="col-md-4">
			<p style="margin-left:10px; margin-top:10px; margin-top:10px;">Type of Activity:</p>	
			</div>
			<div class="col-md-8">
			<div class="well">
			<b><p>{{ $event->type_activity }}</p></b>
			</div>
			</div>

			<div class="col-md-4">
			<p style="margin-left:10px; margin-top:10px;">Number of Participants:</p>
			</div>
			<div class="col-md-8">
			<div class="well">
			<b><p>{{ $event->participants }}</p></b>
			</div>
			</div>

			<div class="col-md-4">
			<p style="margin-left:10px; margin-top:10px;">Venue:</p>
			</div>
			<div class="col-md-8">
			<div class="well">
			<b><p>{{ $event->venue }}</p></b>
			</div>
			</div>

			<div class="col-md-4">
			<p style="margin-left:10px; margin-top:10px;">Activity:</p>
			</div>
			<div class="col-md-8">
			<div class="well">	
			<b><p>
				@if(!empty($event->gym))
				IHM GYM usage,
				@endif
				@if(!empty($event->sales))
				Involving sales of products and services,
				@endif
				@if(!empty($event->film))
				Film Showing/Stage Play,
				@endif
			</p></b>
			</div>
			</div>

			<div class="col-md-4">
			<p style="margin-left:10px; margin-top:10px;">Time:</p>
			</div>
			<div class="col-md-8">
			<div class="well">	
			<b><p> 
			{{ date("g:ia\, jS M Y", strtotime($event->start_time)) . ' until ' . date("g:ia\, jS M Y", strtotime($event->end_time)) }}
			</p></b>
			</div>
			</div>

			<div class="col-md-4">
			<p style="margin-left:10px; margin-top:10px;">Duration:</p> 
			</div>
			<div class="col-md-8">
			<div class="well">	
			<b><p> {{ $duration }}</p></b>
			</div>
			</div>	
		</div>



		<br>
		@if(Auth::user()->Department == "SBADEAN")
		<div class="row">
		@if($event->status== "pending")
		<div class="col-lg-2" style="margin-right:20px;">
			
			<form action="{{ url('approve/'. $event->id) }}" style="display:inline;" method="POST">
			<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Approve</button>
			{{ csrf_field() }} 
			</form>
		</div>
		<div class="col-lg-2">
				{{-- 	</form> --}}

			<button class="btn btn-danger" data-toggle="modal" data-target="#disapprove"><span class="glyphicon glyphicon-remove"></span> Disapprove</button>
		</div>
		@endif 
		</div>
		@endif
		<br><br>
		<div id="disapprove" class="modal fade" role="dialog">
  			<div class="modal-dialog">

    				<!-- Modal content-->
				   <div class="modal-content">
				     <div class="modal-header">
				       <button type="button" class="close" data-dismiss="modal">&times;</button>
				       <h4 class="modal-title">Reason for disapproving the event</h4>
				     </div>
				     <div class="modal-body">
				     <form action="{{ url('disapprove/'. $event->id) }}" method="POST">
				     {{ csrf_field() }} 
				        <textarea class="form-control" rows="7" name="message" id="comment"></textarea><br>
				       <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span>Disapprove</button>
				     </form>
				     </div>
				   </div>

  			</div>
	   </div>


		
	</div>
</div>
</div>
@endsection

@section('js')

@endsection


			
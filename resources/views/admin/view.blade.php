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
		<p><b>Type of Activity</b><br>
		{{ $event->type_activity }}
		</p>
		<p><b>Number of Participants</b> <br>
		{{ $event->participants }}
		</p>
		<p><b>Venue</b><br>
		{{ $event->venue }}
		</p>
		<p><b>Activity</b> <br>
				@if(!empty($event->gym))
				IHM GYM usage<br>
				@endif
				@if(!empty($event->sales))
				Involving sales of products and services<br>
				@endif
				@if(!empty($event->film))
				Film Showing/Stage Play
				@endif
		</p>
		<p><b>Time:</b> <br>
		{{ date("g:ia\, jS M Y", strtotime($event->start_time)) . ' until ' . date("g:ia\, jS M Y", strtotime($event->end_time)) }}
		</p>

		<p><b>Duration:</b> <br>
		{{ $duration }}
		</p>

		@if($event->visitors == 0)
		
		@else
		<p><b>No. of visitors:</b> <br>
		{{ $event->visitors }}
		</p>
		
		@endif

		@if($event->vehicles == 0)
		@else
		<p><b>No. of vehicles:</b> <br>
		{{ $event->vehicles }}
		</p>
		
		@endif

		@if($event->no_uniforms == 0)
		@else
		<p><b>Permission not to wear uniform (No. of Students)</b> <br>
		{{ $event->no_uniforms }}
		</p>	
		
		@endif


		<br>
		@if(Auth::user()->Department == "DEAN")
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


			
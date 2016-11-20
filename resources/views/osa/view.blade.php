@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('/OSA') }}">View Events</a></li>
			<li class="active">{{ $event->title }}</li>
		</ol>

			@include('message')
	</div>
</div>



<div class="row">
	<div class="col-lg-8">
		<h2>{{ $event->title }} <small>booked by {{ $event->name }}</small></h2>
	</div>
	<div class="col-lg-4">

		@if($event->status == "approved" && $event->status2 == "pending")
		<h5 style="margin-top:30px; float:right;">Status:<big style="color:green;"><b> Approved by Deans </b></big></h5>
		@endif
		@if($event->status2 == "approved" && $event->status == "pending")
		<h5 style="margin-top:30px; float:right;">Status:<big style="color:green;"><b> Approved by OSA </b></big></h5>
		@endif
		@if($event->status2 == 'approved' && $event->status == 'approved')
		<h5 style="margin-top:30px; float:right;">Status:<big style="color:green;"><b> Approved by OSA and DEAN </b></big></h5>
		@endif
		@if($event->status == "pending" && $event->status2 == "pending")
		<h5 style="margin-top:30px; float:right;">Status:<big style="color:orange;"><b> Pending </b></big></h5>
		@endif

	</div>

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
		{{ $event->activity }}
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
		@if(Auth::user()->Department == "OSA")
		{{-- 	<form action="{{ url('events/' . $event->id) }}" style="display:inline;" method="POST">
				<input type="hidden" name="_method" value="DELETE" />
				{{ csrf_field() }} --}}
			@if($event->status2== "pending")
			<form action="{{ url('approveOSA/'. $event->id) }}" style="display:inline;" method="POST">
			<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Approve</button>
			{{ csrf_field() }} 
			</form>
		{{-- 	</form> --}}
			<a class="btn btn-danger" href="{{-- {{ url('events/' . $event->id . '/edit')}} --}}">
				<span class="glyphicon glyphicon-remove"></span> Disapprove</a>
				@endif 
		@endif
		</p>
		
	</div>
</div>
</div>
@endsection

@section('js')

@endsection
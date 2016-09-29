@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('/events') }}">Events</a></li>
			<li class="active">{{ $event->title }}</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<h2>{{ $event->title }} <small>booked by {{ $event->name }}</small></h2>
		<hr>
	</div>
</div>

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
		
		<p>
		<br>
		@if(Auth::user())
			<form action="{{ url('events/' . $event->id) }}" style="display:inline;" method="POST">
				<input type="hidden" name="_method" value="DELETE" />
				{{ csrf_field() }}
				<button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
			</form>
			<a class="btn btn-primary" href="{{ url('events/' . $event->id . '/edit')}}">
				<span class="glyphicon glyphicon-edit"></span> Edit</a> 
		@endif
		</p>
		
	</div>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('/js/daterangepicker.js') }}"></script>
<script type="text/javascript">
$(function () {
	$('input[name="time"]').daterangepicker({
		"timePicker": true,
		"timePicker24Hour": true,
		"timePickerIncrement": 15,
		"autoApply": true,
		"locale": {
			"format": "DD/MM/YYYY HH:mm:ss",
			"separator": " - ",
		}
	});
});
</script>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('/events') }}">Events</a></li>
			<li class="active">Edit - {{ $event->title }}</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">

		
		<form action="{{ url('events/' . $event->id) }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT" />

		   <div class="form-group @if($errors->has('type_activity')) has-error has-feedback @endif">
				<label for="name">Type of Activity</label>
				<select name="type_activity" class="form-control">
					<option selected>{{$event->type_activity}}</option>
					<option value="Indoor">Indoor</option>
					<option value="Off-Campus">Off-Campus</option>
				</select>
				@if ($errors->has('type_activity'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('type_activity') }}
					</p>
				@endif
			</div>

			<div class="form-group @if($errors->has('name')) has-error has-feedback @endif">
				<label for="name">Your Name</label>
				<input type="text" class="form-control" name="name" value="{{ $event->name }}" placeholder="E.g. Pisyek">
				@if ($errors->has('name'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('name') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" value="{{ $event->title }}" placeholder="E.g. My event's title">
				@if ($errors->has('title'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('title') }}
					</p>
				@endif
			</div>

		<div class="form-group @if($errors->has('participants')) has-error has-feedback @endif">
			<label for="db">Number of Participants</label>
			<select name="participants" id="dbType" class="form-control">
			   <option  selected>{{$event->participants}}</option>
			   <option value="1-50">1-50</option>
			   <option value="51-100">51-100</option>
			   <option value="101-150">101-150</option>
			   <option value="151-200">151-200</option>
			   <option value="above200">above 200</option>
			</select>
				@if ($errors->has('participants'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('participants') }}
					</p>
				@endif
		</div>	

			<div id="otherType"  class="form-group @if($errors->has('venue')) has-error has-feedback @endif">
			<label for="venue">Facility/Venue</label>
			<select name="venue" id="dbType" class="form-control">
			   <option selected>{{$event->venue}}</option>
			   <option value="SFJ Multipurpose Hall">SFJ Multipurpose Hall</option>
			   <option value="SJH Acad Hall">SJH Acad Hall</option>
			   <option value="University Theatre">University Theatre</option>
			   <option value="PGN Auditorium">PGN Auditorium</option>
			   <option value="Kapampangan Center">Kapampangan Center</option>
			   <option value="Piazza">Piazza</option>
			   <option value="IHM GYM">IHM GYM</option>
			</select>
			</div>

			<div class="form-group @if($errors->has('activity')) has-error has-feedback @endif">
				<label for="name">Activity</label>
				<select name="activity" class="form-control">
					<option selected>{{$event->activity}}</option>
					<option value="Film Showin/Stage play">Film Showin/Stage play</option>
					<option value="Activities/Events Program">Activities/Events Program</option>
					<option value="IHM GYM usage">IHM GYM usage</option>
					<option value="Involving sales of products and services">Involving sales of products and services</option>
				</select>
				@if ($errors->has('activity'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('activity') }}
					</p>
				@endif				
			</div>

			<div class="form-group @if($errors->has('time')) has-error @endif">
				<label for="time">Time</label>
				<div class="input-group">
					<input type="text" class="form-control" name="time" value="{{ $event->start_time . ' - ' . $event->end_time }}" placeholder="Select your time">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
                    </span>
				</div>
				@if ($errors->has('time'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('time') }}
					</p>
				@endif
			</div>
			<button type="submit" class="btn btn-primary" style="margin-bottom:40px;">Submit</button>
		</form>		
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
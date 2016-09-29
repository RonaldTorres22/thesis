@extends('layouts.app')

@section('content')

<style type="text/css">
	.help-block{
		color:#a94442;
	}
</style>

<div class="container">
<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('/events') }}">My Events</a></li>
			<li class="active">Add new event</li>
		</ol>
	</div>
</div>

@include('message')

<div class="row">
	<div class="col-lg-6">
		
		<form action="{{ url('events') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group  @if($errors->has('type_activity')) has-error has-feedback @endif">
				<label for="name">Type of Activity</label>
				<select name="type_activity" class="form-control">
					<option value="" selected disabled>Select Type of Activity</option>
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
				<input type="text" class="form-control" name="name" placeholder="E.g. Pisyek" value="{{ old('name') }}">
				@if ($errors->has('name'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('name') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" placeholder="E.g. Meeting with CEO Kicap Tawar Hebey" value="{{ old('title') }}">
				@if ($errors->has('title'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('title') }}
					</p>
				@endif
			</div>
		<div class="form-group @if($errors->has('participants')) has-error has-feedback @endif">
			<label for="db">Choose Number of Participants</label>
			<select name="participants" id="dbType" class="form-control">
			   <option value="" selected disabled>Choose Number of Participants</option>
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

			<div id="otherType" style="display:none;" class="form-group">
			<label for="venue">Facility/Venue</label>
			<select name="venue" id="dbType" class="form-control">
			   <option value="" selected disabled>Select Venue</option>
			   <option value="SFJ Multipurpose Hall">SFJ Multipurpose Hall</option>
			   <option value="SJH Acad Hall">SJH Acad Hall</option>
			   <option value="University Theatre">University Theatre</option>
			   <option value="PGN Auditorium">PGN Auditorium</option>
			   <option value="Kapampangan Center">Kapampangan Center</option>
			   <option value="Piazza">Piazza</option>
			   <option value="IHM GYM">IHM GYM</option>
			</select>
			</div>

			<div class="form-group form-group @if($errors->has('activity')) has-error has-feedback @endif">
				<label for="name">Activity</label>
				<select name="activity" class="form-control">
					<option value="" selected disabled>Select Activity</option>
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
					<input type="text" class="form-control" name="time" placeholder="Select your time" value="">
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
			<button type="submit" class="btn btn-primary">Submit</button>
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
		"minDate": moment('<?php echo date('Y-m-d G')?>'),
		"timePicker": true,
		"timePicker24Hour": false,
		"timePickerIncrement": 15,
		"autoApply": true,
		"locale": {
			"format": "DD/MM/YYYY HH:mm:ss",
			"separator": " - ",
		}
	});
});


$('#dbType').on('change',function(){
     var selection = $(this).val();
    switch(selection){
    case "above200":
    $("#otherType").show('fast')
   break;
    default:
    $("#otherType").hide('fast')
    }
});
</script>
@endsection
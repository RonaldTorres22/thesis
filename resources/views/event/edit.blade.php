@extends('layouts.app')

@section('content')
<div class="container">
	<div class="page-title">
		<div class="title_left">
			<h3>Edit Event</h3>
		</div>
	</div>
	<div class="clearfix"><br><hr></div>
	

@if($event->status == "pending")	
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

			<div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
				<label for="title">Event Title</label>
				<input type="text" class="form-control" name="title" value="{{ $event->title }}" placeholder="E.g. My event's title">
				@if ($errors->has('title'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('title') }}
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

			<div class="form-group" >
			<div style="padding-left:20px;">
				<label for="name">Activity</label>
				<div style="padding-left:20px;">
				<label class="checkbox"><input type="checkbox" name="film" value="checked">Film Showing/Stage Play</label>
				<label class="checkbox"><input type="checkbox"  name="gym" value="checked">IHM GYM usage</label>
				<label class="checkbox"><input type="checkbox"   name="sales" value="checked">Involving sales of products and services</label>
				</div>
			</div>
			</div>

				<hr>
	

   			<div class="form-group form-group">
   				<div style="padding-left:20px;">                 
   				  <label class="checkbox"><input type="checkbox" ID="chkbxMGift">Request for permission from student conduct office</label>
   				</div>
   		
				<div id="shcompany" style="display:none; padding-left:40px;">    
				    <div class="info">               
				        <label class="checkbox"><input type="checkbox" ID="visitor">Request for visitors</label>
				        <input type="number" style="display:none;" placeholder="Enter No. of Visitor(s)" id="visitorinput" min="0" value ="{{$event->visitors}}" name="visitors" class="form-control" >  
				    </div>
				    <div class="info">  
				   		<label class="checkbox"><input type="checkbox" ID="vehicle">Request for Temporary Vehicle pass</label>
				   		  <input type="number" style="display:none;" placeholder="Enter No. of vehicle(s)" id="vehicleinput" min="0" value ="{{$event->vehicles}}" name="vehicles" class="form-control" >
				    </div>
				    <div class="info">  
				   		<label class="checkbox"><input type="checkbox" ID="uniform">Request for Permission Not to Wear Uniform</label>
				   		  <input type="number" style="display:none;" placeholder="Enter No. of student(s)" id="uniforminput" min="0" value ="{{$event->no_uniforms}}" name="no_uniforms" class="form-control" > 
				    </div>
				</div> 				
				</div> 

			<button type="submit" class="btn btn-primary" style="margin-bottom:40px;">Submit</button>
		</form>		
	</div>
</div>
@else
<p> This event has been approved! </p>
<p><b>Note:</b> Once the event has been approved, you can no longer edit it.</p>
@endif
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

    $(document).ready(function () {
     $('#chkbxMGift').click(function () {
         var $this = $(this);
         if ($this.is(':checked')) {
             $('#shcompany').show('fast');
         } else {
             $('#shcompany').hide('fast');
         }
     });

     $('#visitor').click(function () {
         var $this = $(this);
         if ($this.is(':checked')) {
             $('#visitorinput').show('fast');
         } else {
             $('#visitorinput').hide('fast');
         }
     });
     $('#vehicle').click(function () {
         var $this = $(this);
         if ($this.is(':checked')) {
             $('#vehicleinput').show('fast');
         } else {
             $('#vehicleinput').hide('fast');
         }
     });  
     $('#uniform').click(function () {
         var $this = $(this);
         if ($this.is(':checked')) {
             $('#uniforminput').show('fast');
         } else {
             $('#uniforminput').hide('fast');
         }
     });       
 });


</script>
@endsection
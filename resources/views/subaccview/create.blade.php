@extends('layouts.app')

@section('content')

<style type="text/css">
	.help-block{
		color:#a94442;
	}
</style>
<div class="container">
		<div class="page-title">
		<div class="title_left">
			<h3>Create Event</h3>
		</div>
	</div>
</div>
<div class="container">
@include('message')
		<div class="clearfix"><br></div>
	
<div class="row">
	<div class="col-lg-12">
		<div class="x_panel">
		<form action="{{ route('subacc.create') }}" method="POST"  style="width:50%;">
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

			<div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" placeholder="E.g. Meeting with the president" value="{{ old('title') }}">
				@if ($errors->has('title'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('title') }}
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


			<div class="form-group form-group">
				<label for="name">Activity</label>
				<div style="padding-left:20px;">
				<label class="checkbox"><input type="checkbox" name="film" value="checked">Film Showing/Stage Play</label>
				<label class="checkbox"><input type="checkbox"  name="gym" value="checked">IHM GYM usage</label>
				<label class="checkbox"><input type="checkbox"   name="sales" value="checked">Involving sales of products and services</label>
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
				        <input type="number" placeholder="Enter No. of Visitor(s)" id="visitorinput" min="1" name="visitors" class="form-control" style="display:none;">
				    </div>
				    <div class="info">  
				   		<label class="checkbox"><input type="checkbox" ID="vehicle">Request for Temporary Vehicle pass</label>
				   		<input type="number" placeholder="Enter No. of vehicle(s)" id="vehicleinput" min="1" name="vehicles" class="form-control" style="display:none;">    
				    </div>
				    <div class="info">  
				   		<label class="checkbox"><input type="checkbox" ID="uniform">Request for Permission Not to Wear Uniform</label>
				   		<input type="number" placeholder="Enter No. of student(s)" id="uniforminput" min="1" name="no_uniforms" class="form-control" style="display:none;">    
				    </div>
				</div> 				

			</div>



			<button type="submit" class="btn btn-primary" style="margin-bottom:40px;">Submit</button>
		</form>
		</div>		
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
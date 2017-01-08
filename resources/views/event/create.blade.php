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
		<form action="{{ url('events') }}" method="POST"  style="width:50%;">
			{{ csrf_field() }}
			<div class="form-group  @if($errors->has('type_activity')) has-error has-feedback @endif">
				<label for="name">Type of Activity</label>
				<select name="type_activity" id="type" class="form-control">
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

			<div id="otherTypeVenue" style="display:none;" class="form-group">
			<label for="venue">Facility/Venue</label>
			<input name="venue" type="text" class="form-control hid">
			</select>
			</div>

			<div id="inputpart" style="display:none;" class="form-group">
			<label for="venue">Number of Participants</label>
			<input name="participants" type="number" min='1' class="form-control hid">
			</select>
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
		<div  id="parti" class="form-group @if($errors->has('participants')) has-error has-feedback @endif">
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
				<label for="name">Registration</label>
				<div style="padding-left:20px;">
				<label class="checkbox"><input type="checkbox" name="registration" value="checked">Online Pre-Registration</label>
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
				        <div id="visit" style="display:none;">
				        <input type="text" style="margin-bottom:20px;" placeholder="Enter vistor name" id="visitorinput"  name="visitors[]" class="form-control">
				       	</div>
				       	  <button  style="display:none;"  class="add_field_button btn btn-primary btn-sm">Add More Fields</button>
				    </div>
				    <div class="info">  
				   		<label class="checkbox"><input type="checkbox" ID="vehicle">Request for Temporary Vehicle pass</label>
				   		<div id="plate" style="display:none;">
				   		<input type="text" style="margin-bottom:20px;" placeholder="Enter Plate Number" id="vehicleinput" name="vehicles[]" class="form-control">    
				   		</div>
				   		 <button  style="display:none;" class="add_field_button2 btn btn-primary btn-sm">Add More Fields</button>
				    </div>
				    <div class="info">  
				   		<label class="checkbox"><input type="checkbox" ID="uniform">Request for Permission Not to Wear Uniform</label>
				   		<div id="uniformm" style="display:none;">
				   		<input type="text"  style="margin-bottom:20px;" placeholder="Enter Student's name" id="uniforminput" name="no_uniforms[]" class="form-control">   
				   		</div> 
				   		 <button  style="display:none;" class="add_field_button3 btn btn-primary btn-sm">Add More Fields</button>
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


$('#type').on('change',function(){
     var selection = $(this).val();
    switch(selection){
    case "Off-Campus":
    $("#otherTypeVenue").show('fast')
    $("#inputpart").show('fast')
    $("#parti").hide('fast')
     $("#otherType").hide('fast')
   break;
    default:
    $("#otherTypeVenue").hide('fast')
    $("#inputpart").hide('fast')
    $("#parti").show('fast')
    $('.hid').val('');

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


	$('#visitor').change(function() {

    $('#visit').toggle();
    $('.add_field_button').toggle();

	});

	$('#vehicle').change(function() {

    $('#plate').toggle();
    $('.add_field_button2').toggle();

	});


	$('#uniform').change(function() {

    $('#uniformm').toggle();
    $('.add_field_button3').toggle();

	});

     var max_fields     = 10; //maximum input boxes allowed
    var wrapper         = $("#visit"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div style="margin-top:10px;"><input placeholder="Enter visitor Name" class="form-control" type="text" required name="visitors[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })


     var max_fields     = 10; //maximum input boxes allowed
    var wrapperv         = $("#plate"); //Fields wrapper
    var add_buttonv     = $(".add_field_button2"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_buttonv).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapperv).append('<div style="margin-top:10px;"><input placeholder="Enter visitor Name" class="form-control" type="text" required name="vehicles[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapperv).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })



    var max_fields     = 10; //maximum input boxes allowed
    var wrapperu         = $("#uniformm"); //Fields wrapper
    var add_buttonu     = $(".add_field_button3"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_buttonu).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapperu).append('<div style="margin-top:10px;"><input placeholder="Enter visitor Name" class="form-control" type="text" required name="no_uniforms[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapperu).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })



 });


</script>
@endsection
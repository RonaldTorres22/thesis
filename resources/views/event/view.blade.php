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
#sent{
	color: white;
	border: 2px solid green;
	padding: 4px;
	background-color: green;
}
.well{
	padding: 1px;
	padding-top: 10px;
	padding-left: 20px;
	padding-right: 20px;
	background-color: white;
}
.link{
	padding: 5px;
	border: 1px solid #e3e4e5;
	border-radius: 5px;
	background-color: white
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
<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
<div class="row" style="margin-top:80px; margin-right:10px; margin-left:10px;">
@include('message')
</div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-left:10px;">{{ $event->title }} <small>booked by {{ $event->user->name }}</small></h3>



              </div>

              <div id="myModal" class="modal fade" role="dialog">
  					<div class="modal-dialog">

					   <!-- Modal content-->
					   <div class="modal-content">
					     <div class="modal-header">
					       <button type="button" class="close" data-dismiss="modal">&times;</button>
					       <h4 class="modal-title">Request Suspension of Class</h4>
					     </div>
					     <div class="modal-body">
					     <form action="{{ route('send.letter',$event->id) }}" method="POST">
					     	{{ csrf_field() }}
					         <textarea class="form-control" rows="5" name="letter" id="comment"></textarea>
					         <button type="submit" class="btn btn-primary" style="margin-top:10px;">Send</button>
					      </form>
					     </div>
{{-- 					     <div class="modal-footer">
					       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					     </div> --}}
					   </div>

					 </div>
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
		<h5 style="float:right; margin-right:30px;">Status: <b id="pending">Pending</b></h5>
		@endif
		@if($event->status == "canceled")
		<h5 style="float:right; margin-right:30px;">Status: <b id="canceled">Canceled</b></h5>
		@endif
		@if($event->status == "Disapproved" )
		<h5 style="float:right; margin-right:30px;">Status: <b id="disapproved">Disapproved</b></h5>
		@endif
		<br>

                </div>
              </div>
            </div>

<div class="row">
@if(Auth::user()->id == $event->user_id || Auth::user()->acc_id == $event->name || Auth::user()->name == $event->name)
@if($event->status == "deanDisapproved" || $event->status == "Disapproved")
<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-danger alert-dismissible" role="alert">
			<h4><span class="glyphicon glyphicon-exclamation-sign"></span> This event has been disapproved by {{$message->disapprove_by}}</h4>
			<p><b>Message:</b> {{$message->message}}</p>
			<p></p>

		</div>
	</div>
</div>
@endif
@endif
</div>

	
	<div class="row">
	<div class="col-md-12">
	@if(Auth::user()->id == $event->user_id || Auth::user()->acc_id == $event->name || Auth::user()->name == $event->name)
	@if($event->type_activity == 'Indoor' && $event->status != 'Disapproved' && $event->status != "canceled")	
	 @if($logistic->count() == 1)
		<a href="{{url('viewlogistics',$event->id)}}" style="margin-left:10px;" class="btn btn-primary">View Event Equipments</a>
	 @else
	<a href="{{url('logistics',$event->id)}}" style="margin-left:10px;" class="btn btn-primary">Request Logistics</a>
	@endif
	@endif

                @if($event->status == 'approved')
                @if(Auth::user()->id == $event->user_id || Auth::user()->acc_id == $event->name || Auth::user()->name == $event->name)
                @if($letter->count() == 1)
                	@if($Letter->status == 'pending')
                	   <a class="btn btn-success disabled">Letter Sent..</a>

                	@elseif($Letter->status == 'approved')
    
                	<a href="{{url('getPDF/'.$Letter->id)}}" class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Letter</a>

                	@elseif($Letter->status == 'disapproved')
                	<button class="btn btn-danger disabled "><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Disapproved Letter</button>
                	@else

                	@endif
                @else
                 <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">Request Letter</a>
  				@endif
                 @endif
                @endif

     @if($event->registration == 'checked'  && $event->status != "Disapproved" && $event->status != "canceled")
	<a class="btn btn-primary" href="{{url('participants/'.$event->id)}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> List of Participants</a>
	@endif
	<hr>
		@endif
	</div>
	<hr>
	<div class="col-lg-7">

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

			<div class="col-md-12">
				<hr>
			</div>

			@if(Auth::user()->id == $event->user_id || Auth::user()->acc_id == $event->name || Auth::user()->name == $event->name || Auth::user()->Department == "SCO")



			<div class="col-md-4">
			<p style="margin-left:10px; margin-top:10px;">Visitors list:<br>
			</div>
			<div class="col-md-8">
			<div class="well">	
			@if(!empty($event->visitors))
			<p><b>	{{ $event->visitors }}</b></p>
			@else
			<p><b>NONE</b></p>
			@endif
			</div>
			</div>	

			<div class="col-md-4">
			<p style="margin-left:10px; margin-top:10px;">Plate Number list:<br>
			</div>
			<div class="col-md-8">
			<div class="well">	
			@if(!empty($event->vehicles))
			<p><b>	{{ $event->vehicles }}</b></p>
			@else
			<p><b>NONE</b></p>
			@endif
			</div>
			</div>	


			<div class="col-md-4">
			<p style="margin-left:10px; margin-top:10px;">No Uniform list <br>
			</div>
			<div class="col-md-8">
			<div class="well">	
			@if(!empty($event->no_uniforms))
			<p><b>{{ $event->no_uniforms }}</b></p>
			@else
			<p><b>NONE</b></p>
			@endif
			</div>
			</div>

			@endif

			</div>			
	
		 

	
		
			<br>
			@if(Auth::user()->id == $event->user_id || Auth::user()->acc_id == $event->name || Auth::user()->name == $event->name  )
			<div class="row">

			@if($event->status != 'canceled' && $event->status != 'Disapproved') 
			<div class="col-lg-2" style="margin-right:50px;">
			<form action="{{url('cancelevent/'.$event->id)}}" style="display:inline;" method="POST">
				{{ csrf_field() }}
				<button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-exclamation-sign"></span> Cancel Event</button>
			</form>
			</div>
			@endif
			@if($event->status == 'pending')
			<div class="col-lg-2">	
			<a class="btn btn-primary" style="width:90px;" href="{{ url('events/' . $event->id . '/edit')}}">
				<span class="glyphicon glyphicon-edit"></span> Edit</a>
			</div>
				@endif
        
			</div>
			
			<br><br><br>
				@endif

		</div>

		<div class="col-lg-5">
			@if(Auth::user()->id == $event->user_id || Auth::user()->acc_id == $event->name || Auth::user()->name == $event->name)

			@if($event->registration == "checked" && $event->status != "Disapproved" && $event->status != "canceled")
			<label>Online Registration Link: </label>
			<a href="{{ route('EventRegistration.show',$event->id)}}" class="link">{{ route('EventRegistration.show',$event->id)}}</a>

			<hr>
			@endif

			@if($event->status == "deanDisapproved" || $event->status == "Disapproved" || $event->status == "canceled")
			@else
			<p><b>To do lists:</b></p>
		
			@foreach($todos as $todo)
			<div class=" row" >
				<div class="col-lg-10" >	
					<p class ="ron append" id="{{$todo->id}}">{{$todo->to_do}}</p>			
					
				</div>
				<div class="col-lg-2" id="appendbutton" >
					<form id="formdelete" style="display:inline;" method="DELETE">
						<input type="hidden" name="_method" value="DELETE" />
						{{ csrf_field() }}
						<button type="submit" class="del" id="deltodo" data-id="{{$todo->id}}"><i  class="fa fa-trash fa-lg" aria-hidden="true"></i></button>
					</form>
					
				</div>
			</div>
			
			@endforeach
			
			<div class="row">
				<div class="col-lg-10">
				<p id="jstodo"> </p>
				</div>
				<div class="col-lg-2" id="jsdel">
				
				</div>
			</div>

			<form  id="todoInput" style="padding-top:10px;">
				<div class="form-group  @if($errors->has('to_do')) has-error has-feedback @endif">
					{{ csrf_field() }}
					<div class="input-group">
						<input type="text" name ="to_do" class="form-control" id="inputTodo">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit" id="todo" >ADD</button>
						</span>
					</div>
					
				</div>
			</form>
			@endif
			@endif
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript">
var token = '{{ Session::token() }}'
var urlSaveTodo = "{{ route('add.todo',$event->id) }}";
var urlDelTodo = "{{url('deletetodo/')}}";

var csrf = '{{ csrf_field() }}';
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$(document).ready(function(){
var test;
$('#todoInput').on('submit', function (e){
	e.preventDefault();
var name = $('#inputTodo').val();
var dataId = $(this).attr('data-id');
test = $(".ron").attr("id");


	
$.ajax({
		data: {to_do:name,_token:token},
		url: urlSaveTodo,
		type: 'POST'
			})
.done(function(output){
	$('#jstodo').append('<p id=p_del'+ output +' class="animated fadeIn">'+ name + '</p>');
	$('#jsdel').append('<form id="formdelete" style="display:inline;" method="DELETE">'+ '<input type="hidden" name="_method" value="DELETE">'+ csrf +'<button type="submit" class="del" id="deltodo" style="margin-bottom:4px; margin-right:20px;" data-id="'+output+'"><i  class="fa fa-trash fa-lg" aria-hidden="true"></i></button></form>');
	$("#todoInput")[0].reset();
	

});

});


$('body').on('click', '.del', function (e){
	e.preventDefault();
	var del = $('#formdelete').serialize();
	var dataId = $(this).attr('data-id');
	$(this).remove();
	$("p#" + dataId).remove();
	$("#p_del" + dataId).remove();
	$(".animated fadeIn").remove();


	
$.ajax({
		data: {to_do:name,_token:token},
		url: urlDelTodo + "/" + dataId,
		type: 'GET'
			})
	.done(function(output){
		
		

	});

});

});
</script>
@endsection
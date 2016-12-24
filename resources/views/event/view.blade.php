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
</style>
<div class="container">
<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
<div class="row" style="margin-top:80px; margin-right:10px; margin-left:10px;">
@include('message')
</div>
            <div class="page-title">
              <div class="title_left">
                <h3>{{ $event->title }} <small>booked by {{ $event->user->name }}</small></h3>
                @if($event->status == 'approved')
                @if(Auth::user()->id == $event->user_id)
                @if($letter->count() == 1)
                	@if($Letter->status == 'pending')
                	   <b id="sent" style="margin-top:10px;">Message Sent..</b>

                	@elseif($Letter->status == 'approved')
                	<h4 style="color:green;"><span class="glyphicon glyphicon-ok-circle" ></span> Your request letter has been approved!</h4> 
                	<a href="{{url('getPDF/'.$Letter->id)}}" class="btn btn-primary"><i class="fa fa-download" style="font-size:20px;" aria-hidden="true"></i> Download Letter (PDF)</a>

                	@elseif($Letter->status == 'disapproved')
                	<h4 style="color:red;"><span class="glyphicon glyphicon-remove-circle" ></span> Your request letter has been disapproved!</h4>
                	@else

                	@endif
                @else
                 <a class="btn btn-primary" style="margin-top:10px;" data-toggle="modal" data-target="#myModal">Request Letter</a>
  				@endif
                 @endif
                @endif
 
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
		@if($event->status == "Disapproved" )
		<h5 style="float:right; margin-right:30px;">Status: <b id="disapproved">Disapproved</b></h5>
		@endif
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
			@if(Auth::user()->id == $event->user_id || Auth::user()->acc_id == $event->name || Auth::user()->name == $event->name  )
			<div class="row">
			@if($event->status == 'pending')
			<div class="col-lg-2" style="margin-right:20px;">
			<form action="{{ url('events/' . $event->id) }}" style="display:inline;" method="POST">
				<input type="hidden" name="_method" value="DELETE" />
				{{ csrf_field() }}
				<button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
			</form>
			</div>
			<div class="col-lg-2">	
			<a class="btn btn-primary" href="{{ url('events/' . $event->id . '/edit')}}">
				<span class="glyphicon glyphicon-edit"></span> Edit</a>
			</div>
				@endif
			</div>
				@endif

			
		</div>
		<div class="col-lg-6">
			@if(Auth::user()->id == $event->user_id || Auth::user()->acc_id == $event->name || Auth::user()->name == $event->name)
			@if($event->status == "deanDisapproved" || $event->status == "Disapproved")
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
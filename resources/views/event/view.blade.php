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
			@if(Auth::user()->id == $event->user_id)
			@if($event->status == 'pending')
			<form action="{{ url('events/' . $event->id) }}" style="display:inline;" method="POST">
				<input type="hidden" name="_method" value="DELETE" />
				{{ csrf_field() }}
				<button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
			</form>
			<a class="btn btn-primary" href="{{ url('events/' . $event->id . '/edit')}}">
				<span class="glyphicon glyphicon-edit"></span> Edit</a>
				@endif
				@endif
			</p>
			
		</div>
		<div class="col-lg-6">
			@if(Auth::user()->id == $event->user_id)
			<p><b>To do lists:</b></p>
			@foreach($todos as $todo)
			<div class=" row" >
				<div class="col-lg-10" >
					
					<p class ="ron append" id="{{$todo->id}}">{{$todo->to_do}}</p>
				
					
					
				</div>
				<div class="col-lg-2" id="appendbutton" >
					<form action="{{ url('deletetodo/' . $todo->id) }}" id="formdelete" style="display:inline;" method="DELETE">
						<input type="hidden" name="_method" value="DELETE" />
						{{ csrf_field() }}
						<button type="submit" class="del" id="deltodo" data-id="{{$todo->id}}"><i  class="fa fa-trash fa-lg" aria-hidden="true"></i></button>
					</form>
					
				</div>
			</div>
			
			@endforeach
{{-- 			<div class="row">
				<div class="col-lg-10">
				<p class="append"> </p>
				</div>
				<div class="col-lg-2" id="appendbutton">
				
				</div>
			</div> --}}
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
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
.done(function(){
	test++;
	$('.append').append('<p><p>' + name + '</p></p>').show('fast');
	$('#appendbutton').append('<form action="'+urlDelTodo+'/'+test+'" id="formdelete" style="display:inline;" method="DELETE">'+ csrf +'<button type="submit" class="del" id="deltodo" style="margin-bottom:4px;" data-id ="'+test+'"><i  class="fa fa-trash fa-lg" aria-hidden="true"></i></button><br></form');
	$("#todoInput")[0].reset();
	test++;

});

});


$('.del').on('click', function (e){
	var del = $('#formdelete').serialize();
	var dataId = $(this).attr('data-id')
	$(this).remove();
	$("p#" + dataId).remove();
	e.preventDefault();
;
// $.ajax({
	// 	type: "POST",
	// 	url : urlSaveTodo,
	// 	data: {to_do:name}
// })
$.ajax({
		data: dataId,
		url:  '{{ url('/deletetodo') }}' + '/' + dataId,
		type: 'GET'
			})

.done(function(){
	
});

		});



});
</script>
@endsection
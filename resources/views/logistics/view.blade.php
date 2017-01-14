@extends('layouts.app')
@section('content')
<div class="container">
<style type="text/css">
	.log{
		width: 70%;
		border-radius: 10px;
		float: right;
	}
	.others{
		width: 75%;
		border-radius: 10px;
		float: left;
		margin-left: 32px;
		padding-right: 0px;
	}
	.othersinput{
		float: left;
		border-radius: 10px;
	}
	label{
		clear:both;
		margin-top: 5px;
	}
	h3{
		margin-left: 35px;
	}
	.well{
		padding: 10px;
	}
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
	padding-right: 10px;
	padding-left: 10px;
	background-color: green;
}
</style>

@if(Auth::user()->Department == "CSDO")
<div class="row">
<div class="col-md-12">
		@include('message')
</div>
<div class="col-md-4">
@if($logistic->status == "pending")
<form action="{{url('approverequest/'.$logistic->id)}}" method="post">	
{{ csrf_field() }}
<button class="btn btn-success" type="submit">Approve Eqiupments</button>
</form>
@else

@endif
</div>
<div class="col-md-8">
		@if($logistic->status == "pending")
<h5 style="float:right; margin-right:30px;">Status: <b id="pending">Pending</b></h5>
		@else
<h5 style="float:right; margin-right:30px;">Status: <b id="approve">Approved</b></h5>
		@endif
</div>

<div class="col-md-12">
	 <h3 >{{$logistic->eventlogistic->title}}</h3>
	 <hr>
</div>


<div class="col-md-6">

	      <div class="well">
       <p>Number of Participants: <b>{{$logistic->eventlogistic->participants}}</b></p>
      </div>

      <div class="well">
       <p>Venue: <b>{{$logistic->eventlogistic->venue}}</b></p>
      </div>



</div>
<div class="col-md-6">
	      <div class="well">
       <p>Activity: <b>
       			@if(!empty($logistic->eventlogistic->gym))
				IHM GYM usage,
				@endif
				@if(!empty($logistic->eventlogistic->sales))
				Involving sales of products and services,
				@endif
				@if(!empty($logistic->eventlogistic->film))
				Film Showing/Stage Play,
				@endif
				</b>
				</p>
	</div>

	<div class="well">
		<p>Time: <b>{{ date("g:ia\, jS M Y", strtotime($logistic->eventlogistic->start_time)) . ' until ' . date("g:ia\, jS M Y", strtotime($logistic->eventlogistic->end_time)) }}</b></p>
	</div>
</div>


</div>

<hr>
@else
<div class="row">
<div class="col-md-12">
		@if($logistic->status == "pending")
<h5 style="float:right; margin-right:30px;">Status: <b id="pending">Pending</b></h5>
		@else
<h5 style="float:right; margin-right:30px;">Status: <b id="approve">Approved</b></h5>
		@endif
</div>
</div>
@endif

<h3>Logistics</h3>
<br>
	<div class="row">
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" disabled max="99" value="{{$logistic->CollegeFlag}}" class="form-control log"><br>
				</div>
				<div class="col-md-6">		
					<label>College Flag/s</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->DecorativePlants}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Decorative Plants</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->MonoblockChairs}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Monoblock Chairs</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->PhilippineFlag}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Philippine Flag</label>
				</div>
			</div>
		</div>	
	</div>
	<br>
	<div class="row">
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->Platform}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Platform</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->Rostrum}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Rostrum</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->SchoolFlag}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>School Flag/s</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->StandingBoards}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Standing Boards</label>
				</div>
			</div>
		</div>
		
	</div>
	<br>
	<div class="row">
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->WhitePanel}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>White Panel</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->WoodenChairs}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Wooden Chairs</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->WoodenPanel}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Wooden Panel</label>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<h3>Equipment</h3>
	<br>
	<div class="row">
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->SoundsSystem}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Sound System</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->ExtensionCord}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Extension Cord</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->Microphone}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Microphone</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->WirelessMic}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Wireless Mic</label>
				</div>
			</div>
		</div>	
	</div>
	<br>
	<div class="row">
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->MicStand}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Mic Stand</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->Projector}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Projector</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->ProjectorScreen}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>Projector Screen</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" value="{{$logistic->DvdPlayer}}" disabled class="form-control log" name=""><br>
				</div>
				<div class="col-md-6">
					<label>DVD Player</label>
				</div>
			</div>
		</div>	
	</div>
<hr>

	<h3>Others</h3>
	<br>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="row">
				<div class="col-md-3">
					<input type="number" min="1" max="99" value="{{$logistic->others}}" disabled class="form-control others" name=""><br>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control othersinput" disabled value="{{$logistic->othersName}}"  name="">
				</div>
			</div>
		</div>
	</div>
<br>



</form>
<hr>
</div>
@endsection
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
</style>

<div class="row">
	<div class="col-md-12">
		@include('message')
	</div>
</div>

<h3>Logistics</h3>
<br>

<form action="{{ url('logistic',$event->id) }}" method="POST">
{{ csrf_field() }}
	<div class="row">
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="CollegeFlag"><br>
				</div>
				<div class="col-md-6">
					<label>College Flag/s</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="DecorativePlants"><br>
				</div>
				<div class="col-md-6">
					<label>Decorative Plants</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="MonoblockChairs"><br>
				</div>
				<div class="col-md-6">
					<label>Monoblock Chairs</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="PhilippineFlag"><br>
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
					<input type="number" min="1" max="99" class="form-control log" name="Platform"><br>
				</div>
				<div class="col-md-6">
					<label>Platform</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="Rostrum"><br>
				</div>
				<div class="col-md-6">
					<label>Rostrum</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="SchoolFlag"><br>
				</div>
				<div class="col-md-6">
					<label>School Flag/s</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="StandingBoards"><br>
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
					<input type="number" min="1" max="99" class="form-control log" name="WhitePanel"><br>
				</div>
				<div class="col-md-6">
					<label>White Panel</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="WoodenChairs"><br>
				</div>
				<div class="col-md-6">
					<label>Wooden Chairs</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="WoodenPanel"><br>
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
					<input type="number" min="1" max="99" class="form-control log" name="SoundsSystem"><br>
				</div>
				<div class="col-md-6">
					<label>Sound System</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="ExtensionCord"><br>
				</div>
				<div class="col-md-6">
					<label>Extension Cord</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="Microphone"><br>
				</div>
				<div class="col-md-6">
					<label>Microphone</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="WirelessMic"><br>
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
					<input type="number" min="1" max="99" class="form-control log" name="MicStand"><br>
				</div>
				<div class="col-md-6">
					<label>Mic Stand</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="Projector"><br>
				</div>
				<div class="col-md-6">
					<label>Projector</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="ProjectorScreen"><br>
				</div>
				<div class="col-md-6">
					<label>Projector Screen</label>
				</div>
			</div>
		</div>
		<div class="col-md-3 form-group">
			<div class="row">
				<div class="col-md-6">
					<input type="number" min="1" max="99" class="form-control log" name="DvdPlayer"><br>
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
					<input type="number" min="1" max="99" class="form-control others" name="others"><br>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control othersinput"  name="othersName">
				</div>
			</div>
		</div>
	</div>
<br>

<button type="submit" style="margin-left:30px;" class="btn btn-primary">Submit</button>

</form>
<hr>
</div>
@endsection
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
						<p>({{$cflag}} left)</p>
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
					<p>({{$plants}} left)</p>
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
					<p>({{$mchairs}} left)</p>
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
					<p>({{$pflag}} left)</p>
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
					<p>({{$platform }} left)</p>
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
					<p>({{$rost }} left)</p>
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
					<p>({{$sflag }} left)</p>
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
					<p>({{$sbaords}} left)</p>
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
					<p>({{$wpanel}} left)</p>
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
					<p>({{$wchairs}} left)</p>
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
					<p>({{$wpannel}} left)</p>
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
					<p>({{$ssystem}} left)</p>
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
					<p>({{$excord}} left)</p>
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
					<p>({{$mic}} left)</p>
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
					<p>({{$wimic}} left)</p>
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
					<p>({{$micstand}} left)</p>
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
					<p>({{$projector}} left)</p>
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
					<p>({{$screen}} left)</p>
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
					<p>({{$player}} left)</p>
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
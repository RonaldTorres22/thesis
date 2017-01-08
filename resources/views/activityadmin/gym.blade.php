@extends('layouts.app')

@section('content')
<div class="container">
	<div class="page-title">
		<div class="title_left">
			<h3>IHM GYM USAGE</h3>
		</div>
	</div>
		<div class="clearfix"><br></div>
	<br>

<div class="row">
	<div class="col-lg-12">
	<div class="x_panel">
		@if($events->count() > 0)
		<table class="table table-striped">

			<thead>
				<tr>
					<th>#</th>
					<th>Event's Title</th>
					<th>Start</th>
					<th>End</th>
					<th>Organizers</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			<?php $i = 1;?>
			@foreach($events as $event)
				<tr>
					<th scope="row">{{ $i++ }}</th>
					<td><a href="{{ url('events',$event->id)}}">{{ $event->title }}</a></td>
					<td>{{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}</td>
					<td>{{date("g:ia\, jS M Y", strtotime($event->end_time)) }}</td>
					<td>{{$event->name}}</td>
					@if($event->status == "dean")
					<td><p style="color:white;  background-color:#1fd145; padding:1px; border-radius:20px; text-align:center;" >Approved by Dean</p></td>
					@endif
					@if($event->status == 'approved')
					<td><p style="color:white;  background-color:#1fd145; padding:1px; border-radius:20px; text-align:center;" >Approved</p></td>
					@endif
					@if($event->status == "pending")
					<td><p style="color:white; background-color:orange; padding:1px; border-radius:20px; text-align:center; "> Pending </p></td>
					@endif
					@if($event->status == "Disapproved")
					<td><p style="color:white; background-color:#d82f43; padding:1px; border-radius:20px; text-align:center;"> Disapproved </p></td>
					@endif
					@if($event->status == "canceled")
					<td><p style="color:white; background-color:#1d6987; padding:1px; border-radius:20px; text-align:center;"> Canceled </p></td>
					@endif	
				</tr>
			@endforeach
			</tbody>
		</table>
			{{ $events->links() }}
		@else
			<h2>No event yet!</h2>
		@endif
	</div>
	</div>
</div>
</div>
@endsection

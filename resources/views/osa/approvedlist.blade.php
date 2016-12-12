@extends('layouts.app')

@section('content')
<div class="container">
	<div class="page-title">
		<div class="title_left">
			<h3>Approved Events</h3>
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
					<td><a href="{{ route('OSA.show',$event->id)}}">{{ $event->title }}</a></td>
					<td>{{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}</td>
					<td>{{date("g:ia\, jS M Y", strtotime($event->end_time)) }}</td>
					<td>{{$event->name}}</td>
					
					@if($event->status == 'approved')
					<td style="color:green;" >Approved</td>
					@endif
					
				</tr>
			@endforeach
			</tbody>
		</table>
		@else
			<h2>No event yet!</h2>
		@endif
	</div>
	</div>
</div>
</div>
@endsection
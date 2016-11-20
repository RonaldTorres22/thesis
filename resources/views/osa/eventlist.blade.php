@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a>List of events</a></li>

		</ol>
	</div>
</div>

<div class="row">

	<div class="col-lg-12">
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
					
					@if($event->status == "approved" && $event->status2 == "pending")
					<td style="color:green;">Approved by Deans </td>
					@endif
					@if($event->status2 == "approved" && $event->status == "pending")
					<td style="color:green;" >Approved by OSA </td>
					@endif
					@if($event->status2 == 'approved' && $event->status == 'approved')
					<td style="color:green;" >Approved by OSA and DEAN </td>
					@endif
					@if($event->status == "pending" && $event->status2 == "pending")
					<td style="color:orange;"> Pending </td>
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
@endsection

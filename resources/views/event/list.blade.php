@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li class="active"><a href="{{ url('/events') }}">Events</a></li>
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
					<th>status</th>
				</tr>
			</thead>
			<tbody>
			<?php $i = 1;?>
			@foreach($events as $event)
			@if($event->status == "approved")
				<tr>
					<th scope="row">{{ $i++ }}</th>
					<td><a href="{{ url('events/' . $event->id) }}">{{ $event->title }}</a></td>
					<td>{{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}</td>
					<td>{{date("g:ia\, jS M Y", strtotime($event->end_time)) }}</td>
					
{{-- 					@if($event->status=="pending")	
						<a class="btn btn-primary btn-xs" href="{{ url('events/' . $event->id . '/edit') }}">
							<span class="glyphicon glyphicon-edit"></span> Edit</a> 

						<form action="{{ route('events.destroy') }}" style="display:inline" method="POST">
							<input type="hidden" name="_method" value="DELETE" />
							{{ csrf_field() }}
							<button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
						</form>
					@else
					<h5 style="color:green;"><b>APPROVED</b></h5>
					@endif --}}
					@if($event->status == "approved" && $event->status2 == "pending")
					<td style="color:green;">Approved by Deans </td>
					@endif
					@if($event->status2 == "approved" && $event->status == "pending")
					<td style="color:green;" >Approved by OSA </td>
					@endif
					@if($event->status2 == 'approved' && $event->status == 'approved')
					<td style="color:green;" >Approved by OSA and DEAN </td>
					@endif

					
				</tr>
			@endif
			@endforeach
			</tbody>
		</table>
		<div>
			{{ $events->links() }}
		</div>
		@else
			<h2>No event yet!</h2>
		@endif
	</div>
</div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="container">
	<div class="page-title">
		<div class="title_left">
			<h3>Pending Events</h3>
		</div>
	</div>
		<div class="clearfix"><br></div>
	<br>
	@include('message')
	
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
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;?>
						@foreach($events as $event)
						<tr>
							<th scope="row">{{ $i++ }}</th>
							<td><a href="{{ url('events/' . $event->id) }}">{{ $event->title }}</a></td>
							<td>{{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}</td>
							<td>{{date("g:ia\, jS M Y", strtotime($event->end_time)) }}</td>
							<td>
								@if($event->status=="pending")
								<a class="btn btn-primary btn-xs" href="{{ url('events/' . $event->id . '/edit')}}">
									<span class="glyphicon glyphicon-edit"></span> Edit</a>
									<form action="{{ route('events.destroy', $event->id) }}" style="display:inline" method="POST">
										<input type="hidden" name="_method" value="DELETE" />
										{{ csrf_field() }}
										<button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
									</form>
									@else
									<h5 style="color:green;"><b>APPROVED</b></h5>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{ $events->links() }}
					<div>
						{{-- 	{{ $events->links() }} --}}
					</div>
					@else
					<h2>No event yet!</h2>
					@endif
				</div>
			</div>
		</div>
	</div>
	@endsection
@extends('layouts.app')
@section('content')
<div class="container">
	<div class="page-title">
		<div class="title_left">
			<h3>Disapproved Letters</h3>
		</div>
	</div>
	@include('message')
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
							<th>Organized By</th>
							<th>Event's Letter</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;?>
						@foreach($events as $event)
						<tr>
							<th scope="row">{{ $i++ }}</th>
							<th><a href="{{ url('vpaa/' . $event->eventletter->id) }}">{{$event->eventletter->title}}</a></th>
							<th>{{$event->eventletter->name}}</th>
							<td>{{substr($event->letter,0,50) }} {{strlen($event->letter) > 50 ? "..." : " " }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{ $events->links() }}
					<div>
						{{-- 	{{ $events->links() }} --}}
					</div>
					@else
					<h2>No Letter yet!</h2>
					@endif
				</div>
			</div>
		</div>
	</div>
	@endsection
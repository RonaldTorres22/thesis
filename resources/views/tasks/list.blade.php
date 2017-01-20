@extends('layouts.app')
@section('content')
<div class="container">

<div class="row">
<div class="col-md-12">
    <nav class="breadcrumb" style="margin-bottom:0px;">
  <a class="breadcrumb-item" href="{{url('/')}}">Home > </a>
  <span class="breadcrumb-item active">Create task</span>
</nav>	
</div>
</div>

			<h3>Events List</h3>
	<div class="row">
		<div class="col-lg-12">
			<div class="x_panel">
				@if($task->count() > 0)
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Event's Title</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;?>
						@foreach($task as $tasks)
						<tr>
							<th scope="row">{{ $i++ }}</th>
							<th>{{$tasks->title}}</th>
							@if(empty(Auth::user()->acc_id))
							<th><a href="{{ route('task.show',$tasks->id)}}" class="btn btn-success btn-sm">Create Tasks</a></th>
							@else
							<th><a href="{{ route('task.show',$tasks->id)}}" class="btn btn-success btn-sm">View Tasks</a></th>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $task->links() }}
				<div>
					{{-- 	{{ $events->links() }} --}}
				</div>
				@else
				<h2>No Event yet!</h2>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
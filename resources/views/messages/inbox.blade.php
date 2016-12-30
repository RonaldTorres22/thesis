@extends('layouts.app')
@section('content')

<div class="container">

  <div class="page-title">
    <div class="title_left">
      <h3>Inbox</h3>
      <br>
    </div>
  </div>

<div class="row">
	<div class="col-lg-12">
	<div class="x_panel">
  @if($message->count() > 0)
		<table class="table table-striped">

			<thead>
				<tr>
					<th>#</th>
					<th>Sender</th>
					<th>Message</th>
					<th>Date Created</th>
				</tr>
			</thead>
			<tbody>
			<?php $i = 1;?>
			@foreach($message as $messages)
				<tr>
					<th scope="row">{{ $i++ }}</th>
					<td>{{$messages->sender}}</td>
					<td>{{substr($messages->message,0,50) }} {{strlen($messages->message) > 50 ? "..." : " " }}</td>
					<td>{{ date('M j,Y ', strtotime($messages->created_at))}}</td>
					<td><a href="{{ url('inbox',$messages->id)}}" class="btn btn-default">View</a></td>	
				</tr>
			@endforeach
			</tbody>
		</table>
      {{ $message->links() }}
              @else
          <h2>No Message yet!</h2>
          @endif
	</div>
	</div>
</div>

</div>


@endsection
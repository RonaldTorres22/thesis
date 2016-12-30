@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			@include('message')
			<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#organization"> <span class="glyphicon glyphicon-send"></span> Organizations</button>

			<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#admin"> <span class="glyphicon glyphicon-send"></span> Admin</button>
		</div>
	</div>

<br>
<div class="row">
	<div class="col-lg-12">
	<div class="x_panel">
@if($message->count() > 0)
		<table class="table table-striped">

			<thead>
				<tr>
					<th>#</th>
					<th>Sent to</th>
					<th>Message</th>
					<th>Date Created</th>
				</tr>
			</thead>
			<tbody>
			<?php $i = 1;?>
			@foreach($message as $messages)
				<tr>
					<th scope="row">{{ $i++ }}</th>
					<td>{{$messages->send_to}}</td>
					<td>{{substr($messages->message,0,50) }} {{strlen($messages->message) > 50 ? "..." : " " }}</td>
					<td>{{ date('M j,Y', strtotime($messages->created_at))}}</td>
					<td><a href="{{ url('PersonalMessage',$messages->id)}}"  class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> View</a>
					<form action="{{ route('PersonalMessage.destroy', $messages->id) }}" style="display:inline" method="POST">
										<input type="hidden" name="_method" value="DELETE" />
										{{ csrf_field() }}
										<button class="btn btn-danger btn-sm" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
					</form>
					</td>	
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

<!-- Modal -->
<div id="organization" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send Message to Organization</h4>
      </div>
      <div class="modal-body">

      <form action="{{ route('PersonalMessage.store') }}" method="POST">
		{{ csrf_field() }}

        <label>Send to:</label>
         <select class="form-control" required name="send_to" id="sel1">
         	<option disabled selected hidden>Send to</option>
         	@foreach($orgs as $orgs)
   			 <option value="{{$orgs->name}}">{{$orgs->name}}</option>
   			@endforeach
 		 </select>
        <br>

        <label>Message</label>
        <textarea class="form-control" required rows="5" type="text" name="message"></textarea>
        <br>
        <button class="btn btn-primary" type="submit">Send</button>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="admin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send message to admin</h4>
      </div>
      <div class="modal-body">
      <form action="{{ route('PersonalMessage.store') }}" method="POST">
		{{ csrf_field() }}
        <label>Send to:</label>
         <select class="form-control" required name="send_to" id="sel1">
         	<option disabled selected hidden>Send to</option>
         	@foreach($admin as $admins)
   			 <option value="{{$admins->name}}">{{$admins->name}}</option>
   			@endforeach
 		 </select>
        <br>
        <label>Message</label>
        <textarea class="form-control" required rows="5" type="text" name="message"></textarea>
           <br>
        <button class="btn btn-primary" type="submit">Send</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
@extends('layouts.app')
@section('content')

<div class="container">

<div class="row">
<div class="col-md-12">
    <nav class="breadcrumb">
  <a class="breadcrumb-item" href="{{url('/')}}">Home / </a>
  <span class="breadcrumb-item active">Inbox</span>
</nav>	
</div>
</div>

 <h3 style="margin-top:0px;">Inbox</h3>


<div class="row">
	<div class="col-lg-12">
	@include('message')
	      <form action="{{ route('delete.inbox') }}" method="post">
        <input type="hidden" name="_method" value="DELETE" />
        {{ csrf_field() }}
           @if($message->count() > 0)
            <button class="btn btn-danger btn-sm"  type="submit"><span class="glyphicon glyphicon-trash"></span> Delete all Checked</button>
           @else
        @endif
	<div class="x_panel">
  @if($message->count() > 0)
		<table class="table table-striped">

			<thead>
				<tr>
				 <th><input type="checkbox" id="checkAll"/> </th>
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
					<td><input type="checkbox" name="message[]" data-id="checkbox" class="cb" value="{{$messages->id}}" />  </td>
					<th scope="row">{{ $i++ }}</th>
					<td>{{$messages->sender}}</td>
					<td>{{substr($messages->message,0,50) }} {{strlen($messages->message) > 50 ? "..." : " " }}</td>
					<td>{{ date('M j,Y h:ia', strtotime($messages->created_at))}}</td>
					<td><a href="{{ url('inbox',$messages->id)}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> View</a>
					<form action="{{ url('deleteinbox', $messages->id) }}" style="display:inline" method="GET">
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
	</form>
	</div>
</div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
$("#checkAll").change(function () {
$("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
@endsection
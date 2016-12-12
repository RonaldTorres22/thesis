@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="{{ route('organization.create') }}" class="btn btn-primary">Add Organization</a><br><br>
      <div class="x_panel">
            
        <br>
        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <table  class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Organization Name</th>
              <th>Department</th>
              {{--  <th>Created At</th> --}}
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;?>
            @foreach ($Users as $user)
            
            <tr>
              <th scope="row">{{$i++}}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->Department }}</td>
              {{--  <td>{{ date('M j, Y', strtotime($user->created_at))}}</td> --}}
              
              <td >
                {{--       <ul class="list-inline"> --}}
                  
                  {!! Form::open(['route' => ['organization.destroy', $user->id], 'method' => 'DELETE']) !!}
                  {!! Form::submit('Delete',['class' => 'btn btn-danger btn-xs']) !!}
                  {!! Form::close() !!}
                  
                {{--           </ul> --}}
              </td>
              
            </tr>
            
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
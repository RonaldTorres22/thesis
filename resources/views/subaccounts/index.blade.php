@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @include('message');

      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

<nav class="breadcrumb">
  <a class="breadcrumb-item" href="{{url('/')}}">Home / </a>
  <span class="breadcrumb-item active">Create Sub Account</span>
</nav>

      <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Add Account</button>

      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Register Account</h4>
            </div>
            <div class="modal-body" style="padding:30px;">
              <form action="{{ route('accounts.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                  <label for="name" class="col-xs-3 col-form-label" style="margin-top:10px;">Name:</label>
                  <div class="col-xs-3">
                    <input class="form-control" disabled type="text" required value="{{Auth::user()->name}}" name="name">
                  </div>
                  <div class="col-xs-6">
                    <input class="form-control" type="text" required  placeholder="Enter your name" name="name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-xs-3 col-form-label" style="margin-top:10px;">E-mail:</label>
                  <div class="col-xs-9">
                    <input class="form-control" type="email" placeholder="Enter your e-mail address" required name="email">
                  </div>

                </div>
                <div class="form-group row">
                  <label for="password" class="col-xs-3 col-form-label" style="margin-top:10px;">Password:</label>
                  <div class="col-xs-9">
                    <input class="form-control" type="password" required name="password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password_confirmation" class="col-xs-3 col-form-label" style="margin-top:10px;">Confirm Password:</label>
                  <div class="col-xs-9">
                    <input class="form-control" type="password" required name="password_confirmation">
                  </div>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Register</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div>
        <br>
      </div>

      <div class="x_panel">
          @if($Subacc->count() > 0)
        <table  class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;?>
            @foreach ($Subacc as $account)
            
            <tr>
              <th scope="row">{{$i++}}</th>
              <td>{{ $account->name }}</td>
              <td>{{ $account->email }}</td>
              <td>{{ date('M j, Y', strtotime($account->created_at))}}</td>
              <td >
                {{--       <ul class="list-inline"> --}}
                  
                  {!! Form::open(['route' => ['accounts.destroy', $account->id], 'method' => 'DELETE']) !!}
                  {!! Form::submit('Delete',['class' => 'btn btn-danger btn-xs']) !!}
                  {!! Form::close() !!}
                  
                {{--           </ul> --}}
              </td>
              
            </tr>
            
            @endforeach
          </tbody>
        </table>
              <div>
            {{ $Subacc->links() }}
          </div>
          @else
          <h2>No Sub Account yet!</h2>
          @endif
      </div>
    </div>
  </div>
</div>
@endsection
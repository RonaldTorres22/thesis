@extends('layouts.app')

@section('content')

<div class="container">
<div class="row" style="margin-top:80px; margin-right:10px; margin-left:10px;">
@include('message')
@include('errormessage')
</div>

<style type="text/css">
    .image_profile{
        border-radius: 100px;
        height: 128px;
        width: 128px;
        border:5px solid #34bfad;
    }
</style>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change Avatar</div>
                <div class="panel-body">
                <center>
                 <img class="image_profile" src="/profpics/{{ $user->avatar }}"><br><br>
                  <button data-toggle="modal" data-target="#modal-image" class="btn btn-primary">Change Avatar</button>
                  <button data-toggle="modal" data-target="#modal-delete" class="btn btn-danger">Delete Avatar</button>
                </center>
                <br> 
                </div> 
            </div>
        </div>
    </div>


            <center>
            <!-- Modal - Image -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modal-image" style="z-index:10000;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Choose a photo..</h4>
                  </div>
                  <div class="modal-body">                    
                    <form action="/updateavatar" method="post" files="true" enctype="multipart/form-data">
                        <input type="file" name="avatar">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
     </center>
      <center>    
            <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete" style="margin-top:120px;">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-body">
                  <label>Delete image?</label>
                    <form action="/deleteavatar" method="post">
                        <button type="submit" class="btn btn-primary">Yes</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>                        
                    </form>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
      </center>
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ url('changepassword/'. $user->id) }}">
                	{{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Current Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="old_password" value="">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="">
                                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }} Password must contain at least one uppercase and numeric character</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Confirm New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password_confirmation" value="">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
	</div>
</div>

@endsection
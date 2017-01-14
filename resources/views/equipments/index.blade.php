@extends('layouts.app')
@section('content')
<div class="container">

<style type="text/css">
    .panel-heading{
        padding: 5px;
    }
    .panel-body{
        text-align: center;
        font-size: 20px;
        padding: 10px;
    }
</style>

    <div class="page-title">
        <div class="title_left">
            <h3>Equipments</h3>
            <hr>
        </div>
    </div>
   
    <br>
    <div class="row">
        <div class="col-md-12">
         @include('message')
         @if($equip == 1)
         @else
            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add Equipments</button>
        @endif
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Equipments</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('save.equipment') }}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">CollegeFlag</label>
                            <div class="col-sm-8">
                                <input type="number" name="CollegeFlag" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Rostrum</label>
                            <div class="col-sm-8">
                                <input type="number" name="Rostrum" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">WoodenPanel</label>
                            <div class="col-sm-8">
                                <input type="number" name="WoodenPanel" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">DecorativePlants</label>
                            <div class="col-sm-8">
                                <input type="number" name="DecorativePlants" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">SchoolFlag</label>
                            <div class="col-sm-8">
                                <input type="number" name="SchoolFlag" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">MonoblockChairs</label>
                            <div class="col-sm-8">
                                <input type="number" name="MonoblockChairs" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">StandingBoards</label>
                            <div class="col-sm-8">
                                <input type="number" name="StandingBoards" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">PhilippineFlag</label>
                            <div class="col-sm-8">
                                <input type="number" name="PhilippineFlag" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Platform</label>
                            <div class="col-sm-8">
                                <input type="number" name="Platform" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">WhitePanel</label>
                            <div class="col-sm-8">
                                <input type="number" name="WhitePanel" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">WoodenChairs</label>
                            <div class="col-sm-8">
                                <input type="number" name="WoodenChairs" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">SoundsSystem</label>
                            <div class="col-sm-8">
                                <input type="number" name="SoundsSystem" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Projector</label>
                            <div class="col-sm-8">
                                <input type="number" name="Projector" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">ExtensionCord</label>
                            <div class="col-sm-8">
                                <input type="number" name="ExtensionCord" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">ProjectorScreen</label>
                            <div class="col-sm-8">
                                <input type="number" name="ProjectorScreen" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Microphone</label>
                            <div class="col-sm-8">
                                <input type="number" name="Microphone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">DvdPlayer</label>
                            <div class="col-sm-8">
                                <input type="number" name="DvdPlayer" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">WirelessMic</label>
                            <div class="col-sm-8">
                                <input type="number" name="WirelessMic" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">MicStand</label>
                            <div class="col-sm-8">
                                <input type="number" name="MicStand" class="form-control">
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  
<div class="row">
@if($equip = 1)
@foreach($equipment as $equipments)
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">College Flag</div>
      <div class="panel-body">{{$equipments->CollegeFlag}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Rostrum</div>
      <div class="panel-body">{{$equipments->Rostrum}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Wooden Panel</div>
      <div class="panel-body">{{$equipments->WoodenPanel}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Decorative Plants</div>
      <div class="panel-body">{{$equipments->DecorativePlants}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">School Flag</div>
      <div class="panel-body">{{$equipments->SchoolFlag}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Monoblock Chairs</div>
      <div class="panel-body">{{$equipments->MonoblockChairs}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Standing Boards</div>
      <div class="panel-body">{{$equipments->StandingBoards}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Philippine Flag</div>
      <div class="panel-body">{{$equipments->PhilippineFlag}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Platform</div>
      <div class="panel-body">{{$equipments->Platform}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">WhitePanel</div>
      <div class="panel-body">{{$equipments->WhitePanel}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Wooden Chairs</div>
      <div class="panel-body">{{$equipments->WoodenChairs}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Projector</div>
      <div class="panel-body">{{$equipments->Projector}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Extension Cord</div>
      <div class="panel-body">{{$equipments->ExtensionCord}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Projector Screen</div>
      <div class="panel-body">{{$equipments->ProjectorScreen}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Microphone</div>
      <div class="panel-body">{{$equipments->Microphone}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Dvd Player</div>
      <div class="panel-body">{{$equipments->DvdPlayer}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Wireless Mic</div>
      <div class="panel-body">{{$equipments->WirelessMic}}</div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Mic Stand</div>
      <div class="panel-body">{{$equipments->MicStand}}</div>
    </div>
</div>

@endforeach
@else
@endif
</div>
</div>
@endsection
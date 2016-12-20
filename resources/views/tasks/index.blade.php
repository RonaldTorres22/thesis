@extends('layouts.app')
@section('content')
  <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<style type="text/css"> 
.tilt.right {
    transform: rotate(3deg);
    -moz-transform: rotate(3deg);
    -webkit-transform: rotate(3deg);
}
.tilt.left {
    transform: rotate(-3deg);
    -moz-transform: rotate(-3deg);
    -webkit-transform: rotate(-3deg);
}
body {
    min-width: 520px;
}
.column {
    width: 170px;
    float: left;
    padding-bottom: 100px;
}
.portlet {
    margin: 0 1em 1em 0;
    padding: 0.3em;
}
.portlet-header {
    padding: 0.2em 0.3em;
    margin-bottom: 0.5em;
    position: relative;
}
.portlet-toggle {
    position: absolute;
    top: 50%;
    right: 0;
    margin-top: -8px;
}
.portlet-content {
    padding: 0.4em;
}
.portlet-placeholder {
    border: 1px dotted black;
    margin: 0 1em 1em 0;
    height: 50px;
}
.pad0{
margin-right: 10px;
background-color: #efefef;
width: 27%;
}
.ui-widget-header{
  background-color: #36b5a8 !important;
  color: white;
}

</style>
<div class="container">

<div class="row">

<div class="col-md-6">
 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create Task</button>
</div>

<div class="col-md-6">
 <p style="float:right; padding-right:60px; font-size:2em;">{{$event->title}}</p>
</div>

</div>
<div>
  <hr>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
       <form action="{{ url('task',$event->id) }}" method="POST">
        {{ csrf_field() }}
            <div class="form-group row">
                <label for="password" class="col-xs-2 col-form-label" style="margin-top:10px; padding-left:50px;">To:</label>
                <div class="col-xs-8">
                    <input class="form-control" type="text" required name="to_who">
                  </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-xs-2 col-form-label" style="margin-top:10px; padding-left:50px;">Task:</label>
                <div class="col-xs-8">
                    <textarea class="form-control" rows="5" type="text" required name="task"></textarea>
                  </div>
              </div>

              <button type="submit" class="btn btn-primary" style="margin-left:95px;">Save</button>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<div class="col-md-4 pad0">

<h3><b>TASKS</b></h3>

  <div class="column" style="width:250px;">
  @foreach($task as $tasks)
    <div class="portlet" style="width:250px;">
        <div class="portlet-header">{{$tasks->to_who}}</div>
        <div class="portlet-content">{{$tasks->task}}</div>
    </div>
  @endforeach
 </div>

</div>




<div class="col-md-4 pad0"">

<h3><b>ON DOING</b></h3>
<div class="column" style="width:250px;">

</div>
 </div>



<div class="col-md-4 pad0"">

 <h3><b>DONE</b></h3>
<div class="column" style="width:250px;">

</div>
</div>



</div>
</div>

<script type="text/javascript">
  $( ".column" ).sortable({
    connectWith: ".column",
    handle: ".portlet-header",
    cancel: ".portlet-toggle",
    start: function (event, ui) {
        ui.item.addClass('tilt');
         // Start monitoring tilt tilt_direction
        tilt_direction(ui.item);
    },
    stop: function (event, ui) {
        ui.item.removeClass("tilt");
          // Unbind temporary handlers and excess data
        $("html").unbind('mousemove', ui.item.data("move_handler"));
        ui.item.removeData("move_handler");
    }
});

// Monitor tilt direction and switch between classes accordingly
function tilt_direction(item) {
    var left_pos = item.position().left,
        move_handler = function (e) {
            if (e.pageX >= left_pos) {
                item.addClass("right");
                item.removeClass("left");
            } else {
                item.addClass("left");
                item.removeClass("right");
            }
            left_pos = e.pageX;
        };
    $("html").bind("mousemove", move_handler);
    item.data("move_handler", move_handler);
}  

$( ".portlet" )
    .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
    .find( ".portlet-header" )
    .addClass( "ui-widget-header ui-corner-all" )
    .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");

$( ".portlet-toggle" ).click(function() {
    var icon = $( this );
    icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
    icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
});
</script>
@endsection
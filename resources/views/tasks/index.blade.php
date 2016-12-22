@extends('layouts.app')
@section('content')

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
.title{
  margin-top: 5px;
  float:right; margin-right:60px; font-size:1.5em;
 background-color: #36b5a8;
  text-align: center;
  border-radius: 25px;
  padding-right: 20px;
  padding-left: 20px;
  color: white;
}
hr{
  margin-top: 0px;
  margin-bottom: 10px;
}

.portlet{
  background-color: white;
  border:1px solid #b6b7ba;
  border-radius: 5px;
    box-shadow: 5px 5px 5px #888888;
}

</style>
<div class="container">

<div class="row">

<div class="col-md-6">
 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create Task</button>

</div>

<div class="col-md-6">
 <p class="title">{{$event->title}}</p>
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
        <h4 class="modal-title">Add Task</h4>
      </div>
      <div class="modal-body">
       <form action="{{ url('task',$event->id) }}" method="POST">
        {{ csrf_field() }}
            <div class="form-group row">
                <label for="password" class="col-xs-2 col-form-label" style="margin-top:10px; padding-left:50px;">To:</label>
                <div class="col-xs-8">
                    <input class="form-control" required type="text" required name="to_who">
                  </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-xs-2 col-form-label" style="margin-top:10px; padding-left:50px;">Task:</label>
                <div class="col-xs-8">
                    <textarea class="form-control" required rows="5" type="text" required name="task"></textarea>
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

<h3><b>BACKLOG</b></h3>

  <div class="column col" style="width:250px; height:800px;">
  @foreach($task as $tasks)

    <div class="portlet1 portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" id="move" data-id="{{$tasks->id}}" style="width:250px;">

        <div class="portlet-header ui-widget-header ui-corner-all">{{$tasks->to_who}}</div>
        <div class="portlet-content">{{$tasks->task}}</div>
        <hr>
           <form action="{{ route('task.destroy', $tasks->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE" />
                    {{ csrf_field() }}
                    <button style="float:right;" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-remove"></span> Remove</button>
             </form>
    </div>

  @endforeach
 </div>

</div>




<div class="col-md-4 pad0"">

<h3><b>IN PROGRESS</b></h3>
<div class="column2 col"  style="width:250px; height:800px;">
  @foreach($ongoing as $tasks)
    <div class="portlet2 portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" data-id="{{$tasks->id}}" style="width:250px;">
        <div class="portlet-header ui-widget-header ui-corner-all">{{$tasks->to_who}}</div>
        <div class="portlet-content">{{$tasks->task}}</div>
                <hr>
           <form action="{{ route('task.destroy', $tasks->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE" />
                    {{ csrf_field() }}
                    <button style="float:right;" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-remove"></span> Remove</button>
             </form>
    </div>
  @endforeach
</div>
 </div>



<div class="col-md-4 pad0"">

 <h3><b>DONE</b></h3>
<div class="column3 col"  style="width:250px; height:800px;">
  @foreach($done as $tasks)
    <div class="portlet portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="width:250px;">
        <div class="portlet-header ui-widget-header ui-corner-all">{{$tasks->to_who}}</div>
        <div class="portlet-content">{{$tasks->task}}</div>
    
                    <hr>
           <form action="{{ route('task.destroy', $tasks->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE" />
                    {{ csrf_field() }}
                    <button style="float:right;" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-remove"></span> Remove</button>
             </form>
      </div>
  @endforeach
</div>
</div>



</div>
</div>

<script type="text/javascript">
      //   $(".first").sortable({
      //           connectWith: ".first",
      // update: function (event, ui) {
      //   alert('first');
      // // var id = $(ui.item).attr('data-id');
      // //   var urlDelTodo = "{{url('movetask')}}";

      // //   // POST to server using $.post or $.ajax
      // //   $.ajax({
      // //       data: '',
      // //       type: 'GET',
      // //       url: urlDelTodo + "/" + id
      // //    });
      //     }

      //   });
      //   $(".first").disableSelection();

       $(".col").sortable({
          connectWith: ".col",

              start: function (event, ui) {
        ui.item.addClass('tilt');

         // Start monitoring tilt tilt_direction
        // tilt_direction(ui.item);

    },
    stop: function (event, ui) {
        ui.item.removeClass("tilt");
          // Unbind temporary handlers and excess data
        $("html").unbind('mousemove', ui.item.data("move_handler"));
        ui.item.removeData("move_handler");
    }
            });

  


  $( ".portlet1" ).find('.column2').draggable({ 
      connectWith: ".column2",
     stack: ".portlet1",
    revert: true,
    stop: function (event, ui) {
          // Unbind temporary handlers and excess data
    }
  });

  //   $( ".portlet2" ).draggable({ 
  //    stack: ".portlet2",
  //    appendTo: 'body',
  //   revert: true 
  // });

  $( ".column2" ).droppable({
     accept: ".portlet",
     drop: function(event, ui) {
      var Id = ui.draggable.attr("data-id");
      var urlDelTodo = "{{url('movetask')}}";

        // POST to server using $.post or $.ajax
        $.ajax({
            data: '',
            type: 'GET',
            url: urlDelTodo + "/" + Id
        });
    
   }
 });

  $( ".column3" ).droppable({
     accept: ".portlet2",
     drop: function(event, ui) {
      var Id = ui.draggable.attr("data-id");
      var urlDelTodo = "{{url('donetask')}}";
      // alert(Id);
        // POST to server using $.post or $.ajax
        $.ajax({
            data: '',
            type: 'GET',
            url: urlDelTodo + "/" + Id
        });
    
   }


 });


</script>

<script type="text/javascript">
  
</script>
@endsection
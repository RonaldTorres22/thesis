
@extends('layouts.app')
@section('content')
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<style type="text/css"> 

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

.pad0{
margin-right: 10px;
background-color: #efefef;
width: 30%; 
padding-bottom: 50px;

}
.ui-widget-header{
  background-color: #426caf !important;
  color: white;
}
.title{
  margin-top: 5px;
  float:right; margin-right:60px; font-size:1.5em;
 background-color: #426caf;
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
  margin-left: 25px;

}
.pad0 h3{
  margin-left: 25px;
}
.portlet-content{
  padding-right: 7px;
  padding-left: 7px;
  padding-bottom: 5px;
}

</style>
<div class="container">


<div class="row">

      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

<div class="col-md-6">
@if(empty(Auth::user()->acc_id))
 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Create Task</button>
 @endif
<h4><b>DRAG AND DROP</b></h4>
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
                      <select class="form-control" id="sel1" name="to_who" required>
                      <option hidden value="">Assign task to</option>
                      @foreach($user as $users)
                      <option value="{{$users->name}}">{{$users->name}}</option>
                      @endforeach
                      </select>
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


<div class="row">

<div class="col-lg-4 pad0">
<h3><b>BACKLOG</b></h3>
  <div class="column1 col" style="height:400px;" >
  @foreach($task as $tasks)
    <div class="portlet1 portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" id="move" data-id="{{$tasks->id}}" style="width:250px;">
        <div class="portlet-header ui-widget-header ui-corner-all">{{$tasks->to_who}}</div>
        <div class="portlet-content"><p style="margin-bottom:10px;">{{$tasks->task}}</p>

        <p style="margin-bottom:0px; font-size:11px;">Created at: <b>{{date('M j,Y h:ia',strtotime($tasks->created_at)) }}</b></p>
        <p style="margin-bottom:0px; font-size:11px;">Updated at: <b>{{date('M j,Y h:ia',strtotime($tasks->updated_at)) }}</b></p>

        </div>

        <hr>
           <form action="{{ route('task.destroy', $tasks->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE" />
                    {{ csrf_field() }}
                    <button style="float:right;" class="btn btn-danger btn-xs del{{$tasks->id}}" type="submit"><span class="glyphicon glyphicon-remove"></span> Remove</button>
             </form>
    </div>
  @endforeach
 </div>
</div>


{{-- ---- --}}

<div class="col-lg-4 pad0">

<h3><b>IN PROGRESS</b></h3>
<div class="column2 col" style="height:400px;" >
  @foreach($ongoing as $tasks)
    <div class="portlet2 portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" data-id="{{$tasks->id}}" style="width:250px;">
        <div class="portlet-header ui-widget-header ui-corner-all">{{$tasks->to_who}}</div>
        <div class="portlet-content"><p style="margin-bottom:10px;">{{$tasks->task}}</p>
        <p style="margin-bottom:0px; font-size:11px;">Created at: <b>{{date('M j,Y h:ia',strtotime($tasks->created_at)) }}</b></p>
        <p style="margin-bottom:0px; font-size:11px;">Updated at: <b>{{date('M j,Y h:ia',strtotime($tasks->updated_at)) }}</b></p>

        </div>
                <hr>
           <form action="{{ route('task.destroy', $tasks->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE" />
                    {{ csrf_field() }}
                    <button style="float:right;" class="btn btn-danger btn-xs del{{$tasks->id}}" type="submit"><span class="glyphicon glyphicon-remove"></span> Remove</button>
             </form>
    </div>
  @endforeach
</div>
 </div>

{{-- ---- --}}

<div class="col-lg-4 pad0">

<h3><b>Done</b></h3>
<div class="column3 col" style="height:400px;" >
  @foreach($done as $tasks)
    <div class="portlet2 portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" data-id="{{$tasks->id}}" style="width:250px;">
        <div class="portlet-header ui-widget-header ui-corner-all">{{$tasks->to_who}}</div>
        <div class="portlet-content"><p style="margin-bottom:10px;">{{$tasks->task}}</p>
        <p style="margin-bottom:0px; font-size:11px;">Created at: <b>{{date('M j,Y h:ia',strtotime($tasks->created_at)) }}</b></p>
        <p style="margin-bottom:0px; font-size:11px;">Updated at: <b>{{date('M j,Y h:ia',strtotime($tasks->updated_at)) }}</b></p>

        </div>
                <hr>
           <form action="{{ route('task.destroy', $tasks->id) }}"  method="POST">
                    <input type="hidden" name="_method" value="DELETE" />
                    {{ csrf_field() }}
                    <button style="float:right;" disabled class="btn btn-danger btn-xs del{{$tasks->id}}" type="submit"><span class="glyphicon glyphicon-remove"></span> Remove</button>
             </form>
    </div>
  @endforeach
</div>
 </div>

{{-- ---- --}}
</div>

</div>


<script type="text/javascript">

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

  


  // $( ".portlet1" ).draggable({ 
  //     connectWith: ".column2",
  //    stack: ".portlet1",
  //   revert: true,
  //   stop: function (event, ui) {
  //         // Unbind temporary handlers and excess data
  //   }
  // });


  //   $( ".portlet3" ).draggable({ 
  //    stack: ".portlet3",
  //   connectWith: ".column2",
  //   revert: true,
  //       stop: function (event, ui) {
  //         // Unbind temporary handlers and excess data
  //   }
  // });

  //   $( ".portlet2" ).draggable({ 
  //    stack: ".portlet2",
  //   connectWith: ".column3",
  //   revert: true,
  //       stop: function (event, ui) {
  //         // Unbind temporary handlers and excess data
  //   }
  // });

  $( ".column2" ).droppable({
     accept: ".portlet1,.portlet3,.portlet2",
     drop: function(event, ui) {
      var Id = ui.draggable.attr("data-id");
       $('.del'+Id).prop("disabled", false);
      var urlDelTodo = "{{url('movetask')}}";
        // POST to server using $.post or $.ajax
        $.ajax({
            data: '',
            type: 'GET',
            url: urlDelTodo + "/" + Id
        });
    
   }
 });

  $( ".column1" ).droppable({
     accept: ".portlet3,.portlet2,.portlet1",
     drop: function(event, ui) {
      var Id = ui.draggable.attr("data-id");
      $('.del'+Id).prop("disabled", false);
      var urlDelTodo = "{{url('backlog')}}";
        // POST to server using $.post or $.ajax
        $.ajax({
            data: '',
            type: 'GET',
            url: urlDelTodo + "/" + Id
        });
    
   }
 });



  $( ".column3" ).droppable({
     accept: ".portlet2,.portlet1,.portlet3",
     drop: function(event, ui) {
      var Id = ui.draggable.attr("data-id");
      $( ".del"+Id ).addClass('disabled');
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

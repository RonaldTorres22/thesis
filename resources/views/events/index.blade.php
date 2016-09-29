@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">

            @if ($errors->any())
               <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
               </ul>
            @endif

  			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create event</button>
        </div>
    </div>

  <table class="table table-striped table-bordered table-hover">

      <br>

      @if(Session::has('success'))
          <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif


      <thead>
          <tr class="bg-info">
               <th>ID</th>
               <th>Event Name</th>
               <th>Created At</th>
               
               <th width="20%">Action</th>
           </tr>
      </thead>

      <tbody>

           @foreach ($Events as $event)

               <tr>
                   <td>{{ $event->id }}</td>
                   <td>{{ $event->evt_name }}</td>
                   <td>{{ date('M j, Y', strtotime($event->created_at))}}</td>
               
                   <td >
                   <ul class="list-inline">
                 <li> <a href="{{ route('event.show',$event->id)}}" class="btn btn-primary btn-md" style="width:67px;">View</a></li>

                 <li> 
                  {!! Form::open(['route' => ['event.destroy', $event->id], 'method' => 'DELETE']) !!}
                  {!! Form::submit('Delete',['class' => 'btn btn-danger btn-md']) !!}
                  {!! Form::close() !!}
                  </li>
                  </ul>
                  </td>
    
                  
       
               </tr>

           @endforeach

      </tbody>

  </table>

        <div class="text-center">
      
      </div>

</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Event</h4>

      </div>



      <div class="modal-body">
      

         {!! Form::open(array('route' => 'event.store', 'class' => 'form-horizontal')) !!}
       <div class="form-group">
          <label class="col-md-4 control-label">Type of Activity</label>
          <div class="col-md-6">
          <select class="form-control" name="type_activity">
           <option value="" selected disabled>Select Type of Activity</option>
            <option value="Indoor">Indoor</option>
            <option value="Off-Campus">Off-Campus</option>
          </select>
          </div>
        </div>

       <div class="form-group">
	        <label class="col-md-4 control-label">Activity</label>
	        <div class="col-md-6">
	        <input type="text" name="evt_name" class="form-control" placeholder="Enter Event Name" value="">
	        </div>
      	</div>

              <div class="form-group ">
        <label for="time" class="col-md-4 control-label">Time</label>
        <div class="input-group col-md-6">
          <input type="text" class="form-control" name="time" placeholder="Select your time" value="">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
                    </span>
        </div>
              </div>


	    <div class="form-group">
	        <div class="col-md-4 col-md-offset-4">
	        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
	        </div>
	    </div>



         {!! Form::close() !!}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endsection

<script type="text/javascript">
$(function () {
  $('input[name="time"]').daterangepicker({
    "minDate": moment('2016-09-26 21'),
    "timePicker": true,
    "timePicker24Hour": true,
    "timePickerIncrement": 15,
    "autoApply": true,
    "locale": {
      "format": "DD/MM/YYYY HH:mm:ss",
      "separator": " - ",
    }
  });
});
</script>

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

        </div>
    </div>

  <table class="table table-striped table-bordered table-hover">

      <br>

      @if(Session::has('success'))
          <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif


      <thead>
          <tr class="bg-info">
               <th>Event Name</th>
               <th>Event Description</th>
               <th>Created At</th>
               
               <th width="20%">Action</th>
           </tr>
      </thead>

      <tbody>

           @foreach ($Events as $event)
               <tr>    
                   <td>{{$event->evt_name}}</td>
                   <td>{{ $event->evt_desc }}</td>
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
      {{ $Events->links() }}
      </div>

</div>




@endsection
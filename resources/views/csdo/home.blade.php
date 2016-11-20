@extends('layouts.app')

@section('content')

<style>
.reminder{
margin-top: 30px;
background-color:#eeebeb;
border-radius: 10px;
padding: 20px;
}
#red{
    color: red;
}
.TEvent{
background-color: #47c0ee;
padding:2px;
border-radius: 10px;
margin-top: 30px;
    color: #185f7a;
}

.AEvent{
background-color: #58dd6e;
padding:2px;
border-radius: 10px;
margin-top: 30px;
color: #097c1c;
}
.PEvent{
background-color: #ecb054;
padding:2px;
border-radius: 10px;
margin-top: 30px;
color: #eee3d3;
}
.padleft20{
    padding-left: 20px;
    
}
.padbot10{
    padding-bottom: 10px;
}
.padtop10{
    padding-top: 10px;  
}
.marginbot10{
    margin-bottom: 10px;
}
.Event{
    border-radius: 10px;
    background-color:#eeebeb;
    padding: 2px;
}

.Event p{
    padding-left: 20px;
}

.marginleft20{
    margin-left: 20px;
}
</style>
<div class="container">


@if(Auth::user()->name == "CSDO")

<div class="row">
    <div class = "col-lg-4">
        <div class="reminder">
            <p><b>Reminders</b></p>
            <hr style="border-color:gray;">
            <p id="red"><b>Incoming Event</b></p>
            <hr style="border-color:gray;">
            <p id="red"><b>To-do list </b></p>
        </div>
        <br>
        <center>
        <a href="{{url('/')}}" class="btn btn-primary">View Calendar of Activites</a>
        </center>   
    </div>
    <div class = "col-lg-8">
        <div class="TEvent">             
                 <p class="padleft20 padtop10"><b>Today's Event/s : {{ date("jS "." ". "M Y", strtotime($time)) }}</b></p>
              {{--  <p> {{ date("jS M Y", strtotime($event->start_time)) }}</p>
               <p>  --}}
        </div>
        <br>

        <div class="Event">
              {{--   @if($event->count() > 0) --}}   
            @if($event->count() > 0)      
            @foreach($event as $event)
                     
                   <h4 class="padtop10 marginleft20"><b>{{$event->title}}</b></h4>
                   <p> Start time : {{ date("g:ia", strtotime($event->start_time)) }} | End time : {{date("g:ia", strtotime($event->end_time)) }} </p>
                   <p>Venue: {{$event->venue}}</p>
                   <p>Organizer: {{$event->name}}</p>

           @endforeach 

              @else
                    <h3 class="marginleft20 padbot10"> No event today! </h3>
            @endif      
              {{--  <p> {{ date("jS M Y", strtotime($event->start_time)) }}</p>
               <p>  --}}
            <a href="" class="btn btn-primary marginleft20 marginbot10">View Logistics/Equipment</a>   
        </div>

        <div class="AEvent">
            <p class="padleft20 padtop10"><b>Approved Event/s</b></p>
        </div>
        <br>
        <div class="Event">
        @foreach($approve as $approved)
            <h4 class="padtop10 marginleft20"><b>{{$approved->title}}</b></h4>

            <p>{{ date("g:ia\, jS M Y", strtotime($approved->start_time)) . ' until ' . date("g:ia\, jS M Y", strtotime($approved->end_time)) }}</p>
            <p>Organizer: {{$approved->name}}</p>
            <a class="btn btn-primary marginleft20 marginbot10" href="{{ url('events/' . $approved->id) }}"> View Details</a>
        @endforeach
          {{--   {{ $approve->links() }} --}}
        </div>

        <div class="PEvent">
            <p class="padleft20 padtop10"><b>Past Event/s</b></p>
        </div>
        <br>
        <div class="Event">
        @foreach($past as $past)
            <h4 class="padtop10 marginleft20"><b>{{$past->title}}</b></h4> 

            <p>{{ date("g:ia\, jS M Y", strtotime($past->start_time)) . ' until ' . date("g:ia\, jS M Y", strtotime($past->end_time)) }}</p>
            <p>Organizer: {{$past->name}}</p>
            <a class="btn btn-primary marginleft20 marginbot10" href="{{ url('events/' . $past->id) }}"> View Details</a>
        @endforeach
        
        </div>
      
    </div>
</div>


@endif

</div>
@endsection

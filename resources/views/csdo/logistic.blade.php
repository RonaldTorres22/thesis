@extends('layouts.app')

@section('content')

<div class="container">
    <div class="page-title">
        <div class="title_left">
            <h3>Pending Events</h3>
        </div>
    </div>
    @include('message')
        <div class="clearfix"><br></div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="x_panel">
                @if($events->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event's Title</th>
                            <th>Organized By</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                        @foreach($events as $event)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <th>{{$event->title}}</th>
                            <th>{{$event->name}}</th>
                            <td><a href="{{ url('viewlogistics/' . $event->id) }}" class="btn btn-default">View</a></td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $events->links() }}
                    <div>
                        {{--    {{ $events->links() }} --}}
                    </div>
                    @else
                    <h2>No Event yet!</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

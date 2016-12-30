@extends('layouts.app')
@section('content')
<style type="text/css">
  .well{
    background-color: white;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="well">
        <h3>Sent to: {{$pm->send_to}}</h3>
      </div>
      <div class="well">
        <p>Message:</p>
        <p>{{$pm->message}}</p>
      </div>
    </div>
  </div>
</div>
@endsection
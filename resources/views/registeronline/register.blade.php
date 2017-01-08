<!DOCTYPE html>
<html>
<head>
  <title>{{$event->title}} Registration</title>
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<style type="text/css">
body{
  background-color: #2A3F54;
}
</style>
<div class="container">
<br>
<br>
<br>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    @include('message')
       <div class="well" style="padding-top:0px;">
      <h3 style="margin-bottom:15px;">{{$event->title}}</h3>
      <div class="row">
      <div class="col-md-6">
      <p>Organized by: <b>{{$event->name}}</b></p>
      <p>Venue: <b>{{$event->venue}}</b></p>
      </div>
      <div class="col-md-6">
      <p>Date:  <b>{{ date("M j, Y", strtotime($event->start_time))}}</b> </p>
      <p>Time:  <b> {{ date("g:ia", strtotime($event->start_time)) . ' until ' . date("g:ia", strtotime($event->end_time)) }}</b></p>
      </div>
    </div>

  <hr>
    <form action="{{ url('Registration',$event->id) }}" method="POST">
    {{ csrf_field() }}
      <label>Name</label>
      <input type="text" class="form-control" required="" name="name" style="margin-bottom:10px;">
          <label>Email Address</label>
      <input type="text" class="form-control" required name="email" style="margin-bottom:10px;">
            <label>Contact Number</label>
      <input type="text" class="form-control" required name="contact" style="margin-bottom:10px;">
          <label>Organization</label>
      <input type="text" class="form-control" name="organization" style="margin-bottom:10px;"><br>
      <button class="btn btn-primary" type="submit">Register</button>
    </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
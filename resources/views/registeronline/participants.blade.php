<!DOCTYPE html>
<html>
<head>
  <title>{{$event->title}} | Participants</title>

    <!-- Font Awesome -->
<style type="text/css">
  th{
    padding: 5px;
  }

th{
  text-align: left;
}
#name{
  padding-right: 10px;
}
</style>
</head>
<body>
<h3 style="text-align:center;">{{$event->title}} </h3>
<hr>
    <table  width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Organization</th>
        </tr>

      </thead>
      <tbody>
      <?php $i = 1;?>
      @foreach($part as $parts)
        <tr>
          <th scope="row">{{ $i++ }}</th>
          <td id='name'> {{$parts->name}}</td>
          <td> {{$parts->email}}</td>
          <td> {{$parts->contact}}</td>
          <td> {{$parts->organization}}</td>   
        </tr>
      @endforeach
      </tbody>
      </div>
    </table>


</body>
</html>
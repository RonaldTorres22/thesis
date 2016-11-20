@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <a href="{{ route('organization.create') }}" class="btn btn-primary">Add Organization</a><br>

        

      <br>

      @if(Session::has('success'))
          <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif


  <table  class="table table-striped">
      <thead>
          <tr>
               <th>#</th>
               <th>Organization Name</th>
               <th>Department</th>
               <th>Created At</th>
               <th width="20%">Action</th>
           </tr>
      </thead>

      <tbody>
        <?php $i = 1;?>
       @foreach ($Users as $user)

        @if($user->Department == "DEAN" || $user->Department == "CSDO" || $user->Department == "OSA" || $user->Department == "EMAN" )

        @else
        
               <tr>
                  <th scope="row">{{$i++}}</th>
                   <td>{{ $user->name }}</td>
                   <td>{{ $user->Department }}</td>
                   <td>{{ date('M j, Y', strtotime($user->created_at))}}</td>
               
                   <td >
                   <ul class="list-inline">

                 <li> 
                  {!! Form::open(['route' => ['organization.destroy', $user->id], 'method' => 'DELETE']) !!}
                  {!! Form::submit('Delete',['class' => 'btn btn-danger btn-xs']) !!}
                  {!! Form::close() !!}
                  </li>
                  </ul>
                  </td>
       
               </tr>
        @endif
   @endforeach
     

             </tbody>

         </table>


        </div>
    </div>
</div>
@endsection

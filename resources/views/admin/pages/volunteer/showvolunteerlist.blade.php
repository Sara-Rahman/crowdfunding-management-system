@extends('admin.master')
@section('content')
    

<h3> Showing Volunteer List </h3>
{{-- <a href="{{route('create.ship')}}" --}}
 <a href="{{route('create.volunteer')}}" button type="submit" class="btn btn-primary">Creat Volunteer</button> </a>

 <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Occupation</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach($volunteers as $key=>$value) 

      <tr>
        {{-- @dd($volunteers) --}}
        <th>{{$key+1}}</th>
        <td><img src="{{url('/uploads/volunteers/'.$value->image)}}" style="border-radious:1px" width="200px" alt="volunteer image"></td>
        <td>{{$value->name}}</td>
        <td>{{$value->email}}</td>
        <td>{{$value->mobile}}</td>
        <td>{{$value->occupation}}</td>
       <td>
          <a href="{{route('view.volunteer',$value->id)}}" class="btn btn-primary">View</a> 
          
          <a href="{{route('edit.volunteer',$value->id)}}"class="btn btn-success">Update</a>
         <a href="{{route('delete.volunteer',$value->id)}}" class="btn btn-danger">Delete</a>
         

        </td> 
       
       
      
       
 </tr>
        
 @endforeach
    </tbody>
  </table>
  
  
  @endsection
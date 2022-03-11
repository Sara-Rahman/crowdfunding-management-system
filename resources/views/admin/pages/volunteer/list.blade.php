@extends('admin.master')
@section('content')
    

<h3>Volunteer List </h3>
{{-- <a href="{{route('create.ship')}}" --}}
 <a href="{{route('create.volunteer')}}" button type="submit" class="btn btn-primary">Create Volunteer</button> </a>

 <table class="table" style="text-align: center;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
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
          <a class="btn btn-success btn-sm" href="{{route('view.volunteer',$value->id)}}"><i class="fas fa-eye"></i></a> 
          <a class="btn btn-warning btn-sm" href="{{route('edit.volunteer',$value->id)}}"><i class="fas fa-edit"></i></a>
          <a class="btn btn-danger btn-sm" href="{{route('delete.volunteer',$value->id)}}"><i class="fas fa-trash"></i></a>
         

        </td> 
       
       
      
       
 </tr>
        
 @endforeach
    </tbody>
  </table>
  
  
  @endsection
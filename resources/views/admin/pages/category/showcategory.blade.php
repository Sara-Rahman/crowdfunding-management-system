@extends('admin.master')
@section('content')

<h3> Showing Category List </h3>
{{-- <a href="{{route('create.ship')}}" --}}
 <a href="{{route('create.category')}}" button type="submit" class="btn btn-primary">Create Category</button> </a>

 <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Details</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach($category as $key=>$value) 

      <tr>
        {{-- @dd($volunteers) --}}
        <th>{{$key+1}}</th>
        <td>{{$value->name}}</td>
        <td>{{$value->details}}</td>  
       <td>
          <a href="{{route('view.category',$value->id)}}" class="btn btn-primary">View</a>  
          <a href="{{route('edit.category',$value->id)}}"class="btn btn-success">Update</a>
         <a href="{{route('delete.category',$value->id)}}" class="btn btn-danger">Delete</a>
         

        </td> 
       
       
      
       
 </tr>
        
 @endforeach
    </tbody>
  </table>
@endsection
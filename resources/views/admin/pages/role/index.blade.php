@extends('admin.master')
@section('content')

<hr>
<a href="{{route('roles.create')}}"><button class="btn btn-primary">Create Role</button></a><br><br>


<h1>Index of Roles</h1>


 <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Permissions</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach($roles as $key=>$role) 

      <tr>
        <th>{{$key+1}}</th>
        <td>{{$role->name}}</td>
        <td>
          @foreach($role->role_permissions as $data)
          
        <p class="btn btn-success btn-sm">{{$data->permission->name}}</p>
       
       @endforeach
    </td>        
    <td>{{$role->status}}</td>  

       <td>
          <a href="#"><i class="fas fa-eye"></i></a>  
          <a href="{{route('assign.permission',$role->id)}}"><i class="fas fa-edit"></i>Assign Permission</a>
         <a href="#"><i class="fas fa-trash"></i></a>
         

        </td> 
       
       
      
       
 </tr>
        
 @endforeach
    </tbody>
  </table>


@endsection
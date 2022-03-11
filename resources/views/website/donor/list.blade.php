@extends('admin.master')
@section('content')
<h1>Donor List</h1>
<hr>
<a href="{{route('create.donor')}}" class="btn btn-primary">Create Donor</a><br><br>

        @if(session()->has('message'))
        
            <p class="alert alert-success">
                {{session()->get('message')}}
            </p>
        
        @elseif(session()->has('delete'))
        
            <p class="alert alert-danger">
                {{session()->get('delete')}}
            </p>
        
        @else
        
        @endif


<div>
    <table class="table" style="text-align: center;">
        <thead class="thead-dark">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">City</th>
            <th scope="col">Address</th>
            <th scope="col">Mobile</th>
            <th scope="col">Occupation</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @foreach ($donor as $key=>$item)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->city}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->mobile}}</td>
                <td>{{$item->occupation}}</td>
                <td><img src="{{url('/uploads/donors/'.$item->image)}}" style="border-radius:4px" width="100px" alt="donor image"></td>   
                <td>
                    <a class="btn btn-success btn-sm" href="{{route('view.donor',$item->id)}}"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-warning btn-sm" href="{{route('edit.donor',$item->id)}}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="{{route('delete.donor',$item->id)}}"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
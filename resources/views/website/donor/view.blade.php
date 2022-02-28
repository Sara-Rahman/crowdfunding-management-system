@extends('admin.master')
@section('content')
    <h1>Profile</h1>
    <hr>
    <td><img src="{{url('/uploads/donors/'.$donor->image)}}" style="border-radius:4px" width="100px" alt="donor image"></td>  
    <br><br> 
    <p>Name: {{$donor->name}} </p>
    <p>Email: {{$donor->email}} </p>
    <p>Gender: {{$donor->gender}} </p>
    <p>City: {{$donor->city}} </p>
    <p>Address: {{$donor->address}} </p>
    <p>Mobile: {{$donor->mobile}} </p>
    <p>Occupation: {{$donor->occupation}} </p>
@endsection
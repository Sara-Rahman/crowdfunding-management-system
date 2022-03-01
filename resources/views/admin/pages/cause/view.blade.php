@extends('admin.master')
@section('content')
<div class="container">
<h1>Causes</h1>
    <hr>
        <p>Name: {{$cause->name}}</p>
        <p>Details: {{$cause->details}}</p>
        <p>Category: {{$cause->category}}</p>
        <p>Location: {{$cause->location}}</p>
        <p>Contact Number: {{$cause->contact}}</p>
        <p>Amount: {{$cause->target_amount}}</p>
        <p>
        <img src="{{url('/uploads/causes/'.$cause->image)}}" style="border-radius:4px" width="200px" alt="cause image">
        </p>
</div>

@endsection

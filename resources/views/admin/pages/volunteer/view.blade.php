@extends('admin.master')
@section('content')
    
<h3> Volunteer Profile </h3>
<img src="{{url('/uploads/volunteers/'.$volunteers->image)}}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

<p><b>Name: {{$volunteers->name}}</b></p>
<p><b>Email: {{$volunteers->email}}</b></p>
<p><b>Phone: {{$volunteers->mobile}}</b></p>
<p><b>Occupation: {{$volunteers->occupation}}</b></p>

@endsection

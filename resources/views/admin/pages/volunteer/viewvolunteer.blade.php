@extends('admin.master')
@section('content')
    
<h3> Volunteer Profile </h3>
<img src="{{url('/uploads/volunteers/'.$volunteers->image)}}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

<p><b>Volunteer_Name: {{$volunteers->name}}</b></p>
<p><b>Volunteer_Email: {{$volunteers->email}}</b></p>
<p><b>Volunteer_Phone: {{$volunteers->mobile}}</b></p>
<p><b>Volunteer_Occupation: {{$volunteers->occupation}}</b></p>

@endsection

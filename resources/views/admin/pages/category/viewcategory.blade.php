@extends('admin.master')
@section('content')
    
<h3> Category Format </h3>

<p><b>Category_Name: {{$category->name}}</b></p>
<p><b>Category_Details:{{$category->details}}</b></p>


@endsection
@extends('admin.master')
@section('content')

<h1>Donor Registration</h1>

        @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul> 
        </div>
        @endif

<form action="{{route('store.donor')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
          </div>
          <div class="form-group col-6">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
          </div>
          <div class="form-group col-6 mt-2">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" placeholder="Enter Gender">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="occupation">Occupation</label>
            <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter Occupation">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="mobile">Mobile</label>
            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile No">
        </div>
        <div class="mt-2">
            <label for="donor_image" class="form-label">Insert Image</label>
            <input class="form-control" type="file" id="donor_image" name="donor_image">
        </div>
    </div>
    
    
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection
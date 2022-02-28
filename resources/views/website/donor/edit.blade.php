@extends('admin.master')
@section('content')

<h1>Donor Update</h1>

<form action="{{route('update.donor', $donor->id)}}" method="POST">
    @csrf
    @method('PUT')
    {{-- @dd($donor) --}}
    <div class="row">
        <div class="form-group col-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" value={{$donor->name}} id="name" name="name" placeholder="Enter Name">
        </div>
        <div class="form-group col-6">
              <label for="email">Email</label>
              <input type="email" class="form-control" value={{$donor->email}} id="email" name="email" placeholder="Enter Email">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" value={{$donor->gender}} id="gender" name="gender" placeholder="Enter Gender">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="city">City</label>
            <input type="text" class="form-control" value={{$donor->city}} id="city" name="city" placeholder="Enter City">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="address">Address</label>
            <input type="text" class="form-control" value={{$donor->address}} id="address" name="address" placeholder="Enter Address">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="occupation">Occupation</label>
            <input type="text" class="form-control" value={{$donor->occupation}} id="occupation" name="occupation" placeholder="Enter Occupation">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="mobile">Mobile</label>
            <input type="number" class="form-control" value={{$donor->mobile}} id="mobile" name="mobile" placeholder="Enter Mobile No">
        </div>
        <div class="col-6 mt-2">
            <label for="image" class="form-label">Insert Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
    </div>
    
    
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection
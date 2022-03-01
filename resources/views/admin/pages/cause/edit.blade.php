@extends('admin.master')
@section('content')
<h1>Cause Edit</h1>
<hr>



@if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>
                      {{$error}}
                    </li>   
                  @endforeach
                </ul>
              </div>
  @endif
<form action="{{route('update.cause',$cause->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="form-group col-6">
            <label for="name">Name</label>
            <input type="text" value="{{$cause->name}}" class="form-control" id="name" name="name" placeholder="Enter Cause Name">
          </div>
          <div class="form-group col-6">
              <label for="details">Cause Details</label>
              <input type="text" value="{{$cause->details}}" class="form-control" id="details" name="details" placeholder="Enter Cause Details">
          </div>

          <div class="form-group col-6 mt-2">
            <label class="form-group col-6 mt-2" for="category">Select Cause Category</label>

<select name="category" id="category" class="form-control">
  <option>{{$cause->category}}</option>
  <option value="Medical">Medical</option>
  <option value="Food">Food</option>
  <option value="Flood">Flood</option>
  <option value="Others">Others</option>
</select>
        </div>
        <div class="form-group col-6 mt-2">
            <label for="location">Location</label>
            <input type="text" value="{{$cause->location}}" class="form-control" id="location" name="location" placeholder="Enter Location">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="contact">Contact Number</label>
            <input type="text" value="{{$cause->contact}}" class="form-control" id="contact" name="contact" placeholder="Enter Phone Number">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="cause_image">Insert Image</label>
            <input type="file" class="form-control" id="cause_image" name="cause_image" placeholder="Enter Image">
        </div>
        <div class="form-group col-6 mt-2 mb-2">
            <label for="target_amount">Target Amount</label>
            <input type="number" value="{{$cause->target_amount}}" class="form-control" id="target_amount" name="target_amount" placeholder="Enter Target Amount">
        </div>
        </div>
        <br>
        
    <button type="submit" class="btn btn-primary">Update</button>
  </form>

    
@endsection
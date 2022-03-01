@extends('admin.master')
@section('content')
    

<h1>Create Cause</h1>

    


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
<form action="{{route('store.cause')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Cause Name">
          </div>
          <div class="form-group col-6">
              <label for="details">Cause Details</label>
              <input type="text" class="form-control" id="details" name="details" placeholder="Enter Cause Details">
          </div>

        

          <div class="form-group col-6 mt-2">
            <label class="form-group col-6 mt-2" for="category">Select Cause Category</label>

            <select name="category_id" id="category" class="form-control">
              @foreach ($categories as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
            </div>

        <div class="form-group col-6 mt-2">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="contact">Contact Number</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Phone Number">
        </div>
        <div class="form-group col-6 mt-2">
            <label for="cause_image">Insert Image</label>
            <input type="file" class="form-control" id="cause_image" name="cause_image" placeholder="Enter Image">
        </div>
        <div class="form-group col-6 mt-2 mb-2">
            <label for="target_amount">Target Amount</label>
            <input type="number" class="form-control" id="target_amount" name="target_amount" placeholder="Enter Target Amount">
        </div>
        </div>
        <br>
        
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection
@extends('admin.master')
@section('content')
    <h1>Donation List</h1>
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
    <table class="table table-bordered">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Donor Name</th>
            <th scope="col">Donor Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Address</th>
            <th scope="col">Mobile</th>
            <th scope="col">Amount</th>
            <th scope="col">Transaction ID</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Currency</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
           
        </tbody>
    </table>
</div>
@endsection

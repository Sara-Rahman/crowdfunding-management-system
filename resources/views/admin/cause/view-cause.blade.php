@extends('admin.master')
@section('content')
<div class="container">
<div class="causeToPrint">
<h1>Causes</h1>
<hr>
<p>Cause Name: {{$cause->name}}</p>
<p>Cause Details: {{$cause->details}}</p>
<p>Cause Category: {{$cause->category}}</p>
<p>Cause Location: {{$cause->location}}</p>
<p>Contact Number: {{$cause->contact}}</p>
<p>Target Amount: {{$cause->target_amount}}</p>
<p>
    <img src="{{url('/uploads/causes/'.$cause->image)}}" style="border-radius:4px" width="200px" alt="cause image">
</p>
</div>
<button class="btn btn-primary" type="submit" onClick="PrintDiv('causeToPrint');" value="Print">Print</button><br>
</div>

@endsection
<script language="javascript">
    function PrintDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>
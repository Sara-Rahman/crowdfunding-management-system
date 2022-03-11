@extends('admin.master')
@section('content')
<h4>Assiginging Permission</h4>
<form action="{{route('store.permission')}}" method="POST" >
@csrf
<input type="hidden" name="role_id" value="{{$roles->id}}">

@foreach($modules as $module)
<div class="form-group">

  <label for="exampleInputEmail1">{{$module->name}}</label>
  @foreach($module->assign_permissions as $permission)
  <div class="form-check">
      <input name="assign_permissions[]" class="form-check-input" type="checkbox" value="{{$permission->id}}" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
         {{ucfirst(str_replace('.',' ',$permission->name))}}
      </label>
  </div>
  @endforeach
</div>
  @endforeach
  <br>

  <button type="submit" class="btn btn-success">Submit</button>

</form>
@endsection
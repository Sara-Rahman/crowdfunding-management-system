@extends('admin.master')
@section('content')
<h1>Assiginging Permission</h1>
<form action="{{route('store.permission')}}" method="POST" >
@csrf
<input type="hidden" name="role_id" value="{{$roles->id}}">

    @foreach($modules as $module)
      <div class="form-group">

            <label class="mt-1" for="exampleInputEmail1"><h3>{{$module->name}}</h3></label>
            <hr>
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
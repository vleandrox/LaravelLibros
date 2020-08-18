@extends('layouts.app')
  
@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-2">
        </div>
        <div class="card col-8">
        </br>
        <div class="">
            <h2>.: Editar Permiso :.  </h2>
        </div>
        @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
        <form action="{{ route('roleuser.update',$roleuser->id) }}" method="POST">
        @csrf
        @method('PUT')
            
            
           
            <div class="form-group">
            <label for="user_id"> <strong>Usuario : </strong></label>
            <input type="text" class="form-control"  name="user_id" value="{{$roleuser->user->name}}" disabled >
            </div>
            <div class="form-group">
                <strong>Roles: </strong>
                    <select class="form-control" name="role_id">                                        
                     @foreach($role as $roles)
                         <option value="{{$roles->id}}">{{$roles->nombre}}</option>                         
                     @endforeach                     
                </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>           
        </br>
        </div>
    </div>
</div>

@endsection
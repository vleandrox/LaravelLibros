@extends('layouts.app')
   
@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-2">
        </div>
        <div class="card col-8">
        </br>
        <div class="">
            <h2>.: Editar Autor :.  </h2>
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
    <form action="{{ route('user.update',$user) }}" method="post">
        
    @csrf
        @method('put')
            <div class="form-group">
            <label for="name"><strong>Usuario:</strong></label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Ingrese nombre genero">
            </div>
            <div class="form-group">
            <label for="email"><strong>EMAIL:</strong></label>
            <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Ingrese descripcion">
            </div>
            <div class="form-group">
            <label for="password"><strong>Password:</strong></label>
            <input type="password" class="form-control" name="password" value="" placeholder="Ingrese descripcion">
            </div>
            <div class="form-group">
            <label for="password_confirmation"><strong>Password:</strong></label>
            <input type="password" class="form-control" name="password_confirmation" value="" placeholder="Ingrese descripcion">
            </div>             
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </br>
        </div>
    </div>
</div>


@endsection
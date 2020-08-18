@extends('layouts.app')
  
@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-2">
        </div>
        <div class="card col-8">
        </br>
        <div class="">
            <h2>.:: Enviar Mensaje al Administrador ::.  </h2>
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
        <form action="{{ route('mensaje.store') }}" method="POST">
        @csrf
            <div class="form-group">
            <label for="titulo">Titulo : </label>
            <input type="text" class="form-control"  name="titulo" ></input>
            </div> 
            <div class="form-group">
            <label for="mensaje">Descripcion: </label>
            <textarea class="form-control"  name="mensaje" ></textarea>
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
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-2">
        </div>
        <div class="card col-8">
        </br>
        <div class="">
            <h2>.: Autores :.  </h2>
        </div>       
        <form action="" method="POST">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $autor->nombres }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellidos:</strong>
                {{ $autor->apellidos }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Edad:</strong>
                {{ $autor->edad }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pais:</strong>
                {{ $autor->pais }}
            </div>
        </div>
        <div class="pull-right">                       
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">               
                <a class="btn btn-primary" href="{{ route('autor.index') }}"> Atras</a>
        </div>
        </form>           
        </br>
        </div>
    </div>
</div>
@endsection
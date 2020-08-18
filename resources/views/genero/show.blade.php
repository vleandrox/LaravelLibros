@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-2">
        </div>
        <div class="card col-8">
        </br>
        <div class="">
            <h2>.: Crear Nuevo Genero :.  </h2>
        </div>       
        <form action="" method="POST">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Genero:</strong>
                {{ $genero->genero }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                {{ $genero->descripcion }}
            </div>
        </div>
        <div class="pull-right">                       
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">               
                <a class="btn btn-primary" href="{{ route('genero.index') }}"> Atras</a>
        </div>
        </form>           
        </br>
        </div>
    </div>
</div>
@endsection
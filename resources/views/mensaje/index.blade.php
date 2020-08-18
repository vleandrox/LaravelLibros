@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Laravel 7 CRUD Example </h2>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col-12">
       
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        
   
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">usuario</th>
                    <th scope="col">fecha</th> 
                    <th scope="col">titulo</th>   
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($mensaje as $mensajes)
                <tr>
                    <td>{{$mensajes->id}}</td>
                    <td>{{$mensajes->user->name}}</td>
                    <td>{{$mensajes->fecha}}</td>
                    <td>{{$mensajes->titulo}}</td>
                    
                    <td>       
                               
                        <a class="btn btn-info" href="{{ route('mensaje.show',$mensajes->id) }}" data-toggle="modal" data-target="#modal{{$mensajes->id}}">Leer el Mensaje</a>                                        
                    </td>                                        
                </tr> 
                @include('mensaje.modal') 
                @endforeach
            </tbody>            
            
        </table>
        </div>        
    </div>
</div>
@endsection



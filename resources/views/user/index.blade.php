@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Editar mi perfi :D </h2>
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>                                                           
                    <th scope="col">Password</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            
                <tr>
                
                    <td>{{Auth::user()->id}}</td>//
                    <td>{{Auth::user()->name}}</td>
                    <td>{{Auth::user()->email}}</td>
                    <td></td>
                    <td>
                    <form action="" method="">
                        
                        <a class="btn btn-primary" href="{{route('user.edit',$user)}}">Editar Perfil</a>
                    </form>
                    </td>
                </tr> 
                
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection


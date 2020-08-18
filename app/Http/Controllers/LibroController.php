<?php

namespace App\Http\Controllers;

use App\Events\LibroEvent;
use Illuminate\Http\Request;
use App\Libro;
use App\User;
use App\Notifications\InvoicePaid;
use App\Notifications\LibroNotification;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


 
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['administrador']);

        $libro=Libro::all();
        return view('libro.index',compact('libro'));
    }

    public function create()
    { 
        
        $user=User::select('id','name')->get();
        return view('libro.create',compact('user'));
    }

    
    public function store(Request $request)
    {
        $libro=new Libro;
        $libro->titulo=$request->titulo;
        $libro->genero=$request->genero;
        $libro->publicacion=$request->publicacion;
        $libro->precio=$request->precio;
        $libro->user_id=$request->user()->id;
        $libro->save();

        //auth()->user()->notify(new LibroNotification($libro));
        //User::all()
        //    ->except($libro->user_id)
        //    ->each(function(User $user) use ($libro){
        //        $user->notify(new LibroNotification($libro));
        //    });

        event(new LibroEvent($libro));

        return redirect('home')->with('message','Libro Creado');

    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id,Request $request)
    {

        $request->user()->authorizeRoles(['administrador']);
        $libro=Libro::find($id);       
        return view('libro.edit',compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo'=>'required',
            'genero'=>'required',            
            'publicacion'=>'required',
            'precio'=>'required',            
        ]);

        $libro=Libro::find($id);
        $libro->titulo=$request->get('titulo');
        $libro->genero=$request->get('genero');
        $libro->publicacion=$request->get('publicacion');
        $libro->precio=$request->get('precio');
        $libro->save();

        return redirect('libro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


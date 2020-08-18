<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use DB;

class GeneroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $genero=Genero::all();
        return view('genero.index',compact('genero'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genero=new Genero;
        $genero->genero=$request->genero;
        $genero->descripcion=$request->descripcion;
        $genero->save();

        return redirect('genero');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('genero.show', ['genero' => Genero::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genero=Genero::find($id);
        return view('genero.edit',compact('genero'));
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
            'genero'=>'required',
            'descripcion'=>'required'
        ]);

        $genero=Genero::find($id);
        $genero->genero=$request->get('genero');
        $genero->descripcion=$request->get('descripcion');
        $genero->save();

        return redirect('genero');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();
        return redirect('genero');
    }
}

<?php

namespace App\Http\Controllers;

use App\Events\MensajeEvent;
use Illuminate\Http\Request;
use App\Mensaje;
use App\Notifications\MensajeNotification;
use App\Role;
use Carbon\Carbon;
use App\User;

class MensajeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['administrador']);

        $mensaje=Mensaje::orderBy('fecha','DESC')->get();
        return view('mensaje.index',compact('mensaje'));
        
    }


    public function create()
    {
        return view('mensaje.create');
    }

    public function store(Request $request)
    {        
        $fecha = Carbon::now();

        $mensaje=new Mensaje;
        $mensaje->user_id=$request->user()->id;
        $mensaje->titulo=$request->titulo;
        $mensaje->mensaje=$request->mensaje;
        $mensaje->fecha=$fecha;
        $mensaje->save();

        

        //$admin=Role::all()->where('id','=','1');
        //$admin = User::whereHas('roles', function ($query) {
        //   $query->where('nombre', '=', 'administrador'); // this is the role id inside of this callback
        //})->get();
        //foreach($admin as $admins){
        //    $admins->notify(new MensajeNotification(($mensaje)));
        //}
        event(new MensajeEvent  ($mensaje));

        return redirect('home');
        
    }

    
    public function show($id)
    {
        return view('mensaje.modal', ['mensaje' => Mensaje::findOrFail($id)]);
    }
}

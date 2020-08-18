<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=User::find(1);
        return view('user.index',compact('user'));
        
    }
   

   
    public function show($id)
    {
        
    }


    public function edit(User $user )
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

   
    public function update(User $user)
    { 
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        return redirect('user');
    }

}

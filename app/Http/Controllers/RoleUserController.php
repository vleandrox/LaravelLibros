<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleUser;
use App\User;
use App\Role;

class RoleUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['administrador']);

        $roleuser=RoleUser::all();
        return view('roleuser.index',compact('roleuser'));
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['administrador']);
        $role = Role::select('id','nombre')->get();
        $user = User::select('id','name')->get();
        return view('roleuser.create',compact('role','user'));
    }

    
    public function store(Request $request)
    {
        $roleuser=new RoleUser;
        $roleuser->role_id=$request->role_id;
        $roleuser->user_id=$request->user_id;
        $roleuser->save();

        return redirect('roleuser');

    }

    public function edit($id,Request $request)
    {
        $request->user()->authorizeRoles(['administrador']);
        $roleuser=RoleUser::find($id);
        $role = Role::select('id','nombre')->get();
        $user = User::select('id','name')->get();
        return view('roleuser.edit',compact('roleuser','role','user'));
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
            'role_id'=>'required',
                       
        ]);

        $roleuser=RoleUser::find($id);
        $roleuser->role_id=$request->get('role_id');
        $roleuser->save();

        return redirect('roleuser');
    }
}

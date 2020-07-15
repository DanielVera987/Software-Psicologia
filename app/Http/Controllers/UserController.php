<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     * Formulario para editar
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     * Actualiza en la base de datos el recurso
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'nombre' => 'string|required',
            'apellido' => 'string|required',
            'telefono' => 'required',
            'email' => 'email|required'
        ]);

        $user = Auth::user();
        $datos = $request->all();
        if($id == $user->id)
        {
            $user = User::find($user->id);

            if($user)
            {
                $user->nombre = $datos['nombre'];
                $user->apellido = $datos['apellido'];
                $user->telefono = $datos['telefono'];
                $user->email = $datos['email'];
                $user->save();
                
                return redirect()->route('user.edit')->with('message', 'Todo actualizado');
            }
        }

        return redirect()->route('user.edit')->with('message', 'Error al actualizar usuario');
    }
}

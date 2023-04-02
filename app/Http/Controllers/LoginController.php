<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\TipoUsuario;

class LoginController extends Controller
{
    public function login(){
        return view('Login.login');
    }
    
 public function validar(Request $request){
    $email =$request->input('email');
    $pass=$request->input('password');
    $consulta = Usuario::where('email','=',$email)->where('password','=',$pass)->get();

    if(count($consulta)==0){
        $request->session()->flash('error', 'Correo electrónico o contraseña incorrectos.');
        return redirect()->route('login');
    }
    else{
        /* CREAR LAS SESIONES */
        $request->session()->put('session_id',$consulta[0]->id);
        $request-> session()->put('session_name',$consulta[0]->nombre_u);
        $request>session()->put('session_tipo',$consulta[0]->usuario_id);

        /* CONSULTA DE LAS SESSION */
        $session_id=$request->session()->get('session_id');
        $session_name=$request->session()->get('session_name');
        $session_tipo=$request->session()->get('session_tipo');

        if($session_tipo == 1) {
            session()->flash('bienvenida', "Bienvenido, $session_name");
            return view("welcome");
        } else if($session_tipo == 2) { 
            session()->flash('bienvenida', "Bienvenido, $session_name");
            return view("welcome"); 
        } else {
            session()->flash('bienvenida', "Bienvenido, $session_name");
            return view("welcome");
        }
    }
 }   
 public function logout(Request $request){
    $request->session()->forget('session_id');
    $request->session()->forget('session_name');
    $request->session()->forget('session_tipo');
    return view('Login.login');
 }
}

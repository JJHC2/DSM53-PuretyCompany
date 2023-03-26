<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoUsuario::Select('tipo_usuario.id','usuario.nombre_u','tipo_usuario.nombre_t')
        ->join('usuario','usuario.id','=','tipo_usuario.usuario_id')->get();
        return view("Tipo.index",compact("tipos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::all('id','nombre_u');
        return view('Tipo.create' ,compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipos=$request->all();
        TipoUsuario::create($tipos);
        return redirect('t_usuario')->with('agregar','Ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo = TipoUsuario::find($id);
    
        return view('Tipo.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios=Usuario::all('id','nombre_u');
        $tipo = TipoUsuario::findOrFail($id);    
        return view('Tipo.edit', compact('tipo','usuarios'));
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
        $tipo = TipoUsuario::findOrFail($id);
        $input=$request->all();
        $tipo->update($input);
        return redirect('t_usuario')->with('editar','Ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = TipoUsuario::find($id);

        if ($tipo) {
            $tipo->delete();
            return redirect('t_usuario')->with('eliminar','Ok');
        } else {
            return redirect()->route('Tipo.index');
        }
    }
}

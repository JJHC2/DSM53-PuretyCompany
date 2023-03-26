<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposito;
use App\Models\Usuario;

class DepositoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depositos = Deposito::Select('deposito.id','deposito.codigo','deposito.capacidad','deposito.Lugar','usuario.nombre_u')
        ->join('usuario','usuario.id','=','deposito.usuario_id')->get();
        return view("deposito.index",compact("depositos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::all('id','nombre_u');
        return view('Deposito.create' ,compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deposito=$request->all();
        Deposito::create($deposito);
        return redirect('deposito')->with('agregar','Ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deposito = Deposito::find($id);
    
        return view('deposito.show', compact('deposito'));
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
        $deposito = Deposito::findOrFail($id);    
        return view('Deposito.edit', compact('deposito','usuarios'));
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
        $deposito = Deposito::findOrFail($id);
        $input=$request->all();
        $deposito->update($input);
        return redirect('deposito')->with('editar','Ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deposito = Deposito::find($id);

        if ($deposito) {
            $deposito->delete();
            return redirect('deposito')->with('eliminar','Ok');
        } else {
            return redirect()->route('deposito.index');
        }
    }
}

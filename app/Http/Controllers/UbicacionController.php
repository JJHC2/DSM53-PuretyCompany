<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ubicacion;
use App\Models\Usuario;
use App\Models\Estados;
use App\Models\Municipios;
class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicacion = Ubicacion::Select('ubicacion.id','ubicacion.calle','ubicacion.colonia','ubicacion.n_ex','ubicacion.n_int','ubicacion.ciudad',
        'usuario.nombre_u','estados.nombre_e','municipios.nombre')
        ->join('usuario','usuario.id','=','ubicacion.usuario_id')->join('estados','estados.id','=','ubicacion.estado_id')
        ->join('municipios','municipios.id','=','ubicacion.municipio_id')
      ->get();
        return view("Ubicacion.index",compact("ubicacion"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::all('id','nombre_u');
        $estados=Estados::all('id','nombre_e');
        $municipios=Municipios::all('id','nombre');
        return view('ubicacion.create' ,compact('usuarios','estados','municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ubicacion=$request->all();
        Ubicacion::create($ubicacion);
        return redirect('ubicacion')->with('agregar','Ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ubicacion = Ubicacion::find($id);
    
        return view('ubicacion.show', compact('ubicacion'));
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
        $estados=Estados::all('id','nombre_e');
        $municipios=Municipios::all('id','nombre');
        $ubicacion = ubicacion::findOrFail($id);    
        return view('ubicacion.edit', compact('ubicacion','usuarios','estados','municipios'));
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
        $ubicacion = ubicacion::findOrFail($id);
        $input=$request->all();
        $ubicacion->update($input);
        return redirect('ubicacion')->with('editar','Ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ubica = ubicacion::find($id);

        if ($ubica) {
            $ubica->delete();
            return redirect('ubicacion')->with('eliminar','Ok');
        } else {
            return redirect()->route('Tipo.index');
        }
    }

}

<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ubicacion;

class UbicacionApiController extends Controller
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
      return response()->json([$ubicacion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        Ubicacion::create($input);

        return ('La ubicacion se dio de alta con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ubicacion = Ubicacion::Select('ubicacion.id','ubicacion.calle','ubicacion.colonia','ubicacion.n_ex','ubicacion.n_int','ubicacion.ciudad',
        'usuario.nombre_u','estados.nombre_e','municipios.nombre')
        ->join('usuario','usuario.id','=','ubicacion.usuario_id')->join('estados','estados.id','=','ubicacion.estado_id')
        ->join('municipios','municipios.id','=','ubicacion.municipio_id')
        ->where('ubicacion.id', '=', $id)->first();
        return Response()->json($ubicacion,200);
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
        $ubicacion = Ubicacion::findOrFail($id);
        $input=$request->all();
        $ubicacion->update($input);

        return ('El ubicacion se actualizo con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ubicacion= Ubicacion::findOrFail($id);

        $ubicacion->delete();

        return ('La ubicacion se elimino de manera correcta');
    }
}

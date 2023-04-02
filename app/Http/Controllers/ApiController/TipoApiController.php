<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoUsuario;

class TipoApiController extends Controller
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
        return response()->json([$tipos]);
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
        TipoUsuario::create($input);

        return ('El tipo usuario se dio de alta con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    public function show($id)
{
    $tipos = TipoUsuario::select('tipo_usuario.id','usuario.nombre_u','tipo_usuario.nombre_t')
    ->join('usuario','usuario.id','=','tipo_usuario.usuario_id')
                       ->where('tipo_usuario.id', '=', $id)
                       ->first();
    return Response()->json($tipos,200);
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
        $tipos = TipoUsuario::findOrFail($id);
        $input=$request->all();
        $tipos->update($input);

        return ('El tipo usuario se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipos= TipoUsuario::findOrFail($id);

        $tipos->delete();

        return ('El tipo usuario se elimino de manera correcta');
    }
}

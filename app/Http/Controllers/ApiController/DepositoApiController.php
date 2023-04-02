<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposito;

class DepositoApiController extends Controller
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
        return response()->json([$depositos]);
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
        Deposito::create($input);

        return ('El deposito se dio de alta con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $depositos = Deposito::Select('deposito.id','deposito.codigo','deposito.capacidad','deposito.Lugar','usuario.nombre_u')
        ->join('usuario','usuario.id','=','deposito.usuario_id')
        ->where('deposito.id', '=', $id)->first();
        return Response()->json($depositos,200);
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
        $depositos = Deposito::findOrFail($id);
        $input=$request->all();
        $depositos->update($input);

        return ('El deposito se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depositos= Deposito::findOrFail($id);

        $depositos->delete();

        return ('El deposito se elimino de manera correcta');
    }
}

<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensor = Sensor::Select('sensor.id','sensor.nombre','deposito.codigo')
        ->join('deposito','deposito.id','=','sensor.deposito_id')->get();
        return response()->json([$sensor]);
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
        Sensor::create($input);

        return ('El sensor se dio de alta con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sensor = Sensor::Select('sensor.id','sensor.nombre','deposito.codigo')
        ->join('deposito','deposito.id','=','sensor.deposito_id')
        ->where('sensor.id', '=', $id)->first();
        return Response()->json($sensor,200);
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
        $sensor = Sensor::findOrFail($id);
        $input=$request->all();
        $sensor->update($input);

        return ('El sensor se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sensor= Sensor::findOrFail($id);

        $sensor->delete();

        return ('El sensor se elimino de manera correcta');
    }
}

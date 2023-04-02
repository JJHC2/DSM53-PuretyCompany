<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requerimiento;
class RequisitosApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requerimientos = Requerimiento::Select('requerimientos.id','requerimientos.PPM','sensor.nombre')
        ->join('sensor','sensor.id','=','requerimientos.sensor_id')->get();
        return response()->json([$requerimientos]);
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
        Requerimiento::create($input);

        return ('El registro se dio de alta con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requerimientos = Requerimiento::Select('requerimientos.id','requerimientos.PPM','sensor.nombre')
        ->join('sensor','sensor.id','=','requerimientos.sensor_id')
        ->where('requerimientos.id', '=', $id)->first();
        return Response()->json($requerimientos,200);
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
        $requerimientos = Requerimiento::findOrFail($id);
        $input=$request->all();
        $requerimientos->update($input);

        return ('El registro se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requerimientos= Requerimiento::findOrFail($id);

        $requerimientos->delete();

        return ('El registro se elimino de manera correcta');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sensor;
use App\Models\Deposito;

class SensorController extends Controller
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
        return view("Sensor.index",compact("sensor"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deposito = Deposito::all('id','codigo');
        return view('Sensor.create' ,compact('deposito'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sensor=$request->all();
        Sensor::create($sensor);
        return redirect('sensor')->with('agregar','Ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sensor = Sensor::find($id);
    
        return view('sensor.show', compact('sensor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deposito=Deposito::all('id','codigo');
        $sensor = Sensor::findOrFail($id);    
        return view('sensor.edit', compact('deposito','sensor'));
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
        return redirect('sensor')->with('editar','Ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $senso = Sensor::find($id);

        if ($senso) {
            $senso->delete();
            return redirect('sensor')->with('eliminar','Ok');
        } else {
            return redirect()->route('sensor.index');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle;
use App\Models\Tipo;
use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;


class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios=Detalle::all();
        return view('detalles.index',[
            'servicios'=>$servicios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoServicios=Tipo::get();
        return view('detalles.create',[
            'tipoServicios'=>$tipoServicios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicio= new Detalle;
        $servicio->nombre=$request->nombre;
        if($request->hasFile("imagen")){
            $file= $request->file("imagen");
            $nombre= "cliente_" . time() . "." . $file->guessExtension();
            $ruta= public_path("imagenServicios/" . $nombre);
            copy($file, $ruta);
            $servicio->imagen=$nombre;

        }
        $servicio->tipo_id=$request->tipo_id;
        $servicio->fechaInicio=$request->fechaInicio;
        $servicio->fechaFin=$request->fechaFin;
        $servicio->observaciones=$request->observaciones;
        $servicio->save();
        return redirect('/servicios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio=Detalle::find($id);
        $tipoServicios=Tipo::get();
        return view('detalles.edit',[
            'servicio'=>$servicio,
            'tipoServicios'=>$tipoServicios
        ]);


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
        $servicio=Detalle::find($id);

        $servicio->nombre=$request->nombre;
        if($request->hasFile("imagen")){
            $file= $request->file("imagen");
            $nombre= "cliente_" . time() . "." . $file->guessExtension();
            $ruta= public_path("imagenServicios/" . $nombre);
            copy($file, $ruta);
            $servicio->imagen=$nombre;

        }
        $servicio->tipo_id=$request->tipo_id;
        $servicio->fechaInicio=$request->fechaInicio;
        $servicio->fechaFin=$request->fechaFin;
        $servicio->observaciones=$request->observaciones;
        $servicio->save();
        return redirect('/servicios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //funciones para asignar servicio por cliente

    public function asignarServicio($id){
        $clientes=Cliente::get();
        $servicio=Detalle::find($id);
        return view('detalles.asignarServicio',[
            'clientes'=>$clientes,
            'servicio'=>$servicio
        ]);

    }

    public function guardarAsignacion(Request $request,$id){

        $servicio=Detalle::find($id)->clientes()->attach($request->clientes);

        return redirect('/servicios');


    }
}

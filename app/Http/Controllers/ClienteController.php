<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes= Cliente::all();
        return view('clientes.index',[
            'clientes'=>$clientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente= new cliente;
        $cliente->nombre= $request->nombre;
        if($request->hasFile("imagen")){
            $file= $request->file("imagen");
            $nombre= "cliente_" . time() . "." . $file->guessExtension();
            $ruta= public_path("imagenCliente/" . $nombre);
            copy($file, $ruta);
            $cliente->imagen=$nombre;

        }
        $cliente->cedula=$request->cedula;
        $cliente->correo=$request->correo;
        $cliente->telefono=$request->telefono;
        $cliente->observaciones=$request->observaciones;

        $cliente->save();
        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente=cliente::find($id);

        //consulta para traer todos los servicios del cliente
        $servicios_by_clientes=DB::table('clientes')
        ->join('cliente_detalle','clientes.id','=','cliente_detalle.cliente_id')
        ->join('detalles','detalles.id','=','cliente_detalle.detalle_id')
        ->select('detalles.nombre','detalles.imagen','detalles.tipo_id','detalles.fechaInicio','detalles.fechaFin', 'detalles.observaciones')
        ->where('clientes.id',$id)->get();

        return view('clientes.show',[
            'servicios_by_clientes'=> $servicios_by_clientes,
            'cliente'=>$cliente
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Cliente::find($id);
        return view('clientes.edit',[
            'cliente'=>$cliente
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
        $cliente=Cliente::find($id);
        $cliente->nombre= $request->nombre;
        if($request->hasFile("imagen")){
            $file= $request->file("imagen");
            $nombre= "cliente_" . time() . "." . $file->guessExtension();
            $ruta= public_path("imagenCliente/" . $nombre);
            copy($file, $ruta);
            $cliente->imagen=$nombre;

        }
        $cliente->cedula=$request->cedula;
        $cliente->correo=$request->correo;
        $cliente->telefono=$request->telefono;
        $cliente->observaciones=$request->observaciones;

        $cliente->save();
        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente=Cliente::find($id);
        unlink('imagenCliente/' . $cliente->imagen);
        $cliente->delete();
        return redirect('/clientes');

    }
}

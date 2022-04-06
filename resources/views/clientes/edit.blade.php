@extends('layouts.menu')



@section('content')

<h1>editar cliente</h1>

<div class="card" style="width: 30rem;">
  <div class="card-body">
    
  <form action="{{route('clientes.update', $cliente->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}">
    
  </div>

  <div class="mb-3">
     @if(isset($cliente->imagen))
        <img class="img-thumbnail img-fluid" src="{{ asset('/imagenCliente' . '/'. $cliente->imagen)}}" alt="" width="100">


      @endif
    <label for="imagen" class="form-label">Imagen</label>
    <input type="file" class="form-control" name="imagen">
    
  </div>

  <div class="mb-3">
    <label for="cedula" class="form-label">Cedula</label>
    <input type="text" class="form-control" name="cedula" value="{{$cliente->cedula}}">
    
  </div>

  <div class="mb-3">
    <label for="correo" class="form-label">Correo</label>
    <input type="email" class="form-control" name="correo" value="{{$cliente->correo}}">
    
  </div>

  <div class="mb-3">
    <label for="telefono" class="form-label">Telefono</label>
    <input type="text" class="form-control" name="telefono" value="{{$cliente->telefono}}">
    
  </div>

  <div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones</label>
    <input type="text" class="form-control" name="observaciones" value="{{$cliente->observaciones}}">
    
  </div>

  
  
  <button type="submit" class="btn btn-primary">editar</button>
</form>

  </div>
</div>


@endsection
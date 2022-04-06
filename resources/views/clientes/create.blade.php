@extends('layouts.menu')



@section('content')

<h1 class="text-center">nuevo cliente</h1>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card" style="width: 30rem;">
  <div class="card-body">
    
  <form action="{{ route('clientes.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre">
    
  </div>

  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    <input type="file" class="form-control" name="imagen">
    
  </div>

  <div class="mb-3">
    <label for="cedula" class="form-label">Cedula</label>
    <input type="text" class="form-control" name="cedula">
    
  </div>

  <div class="mb-3">
    <label for="correo" class="form-label">Correo</label>
    <input type="email" class="form-control" name="correo">
    
  </div>

  <div class="mb-3">
    <label for="telefono" class="form-label">Telefono</label>
    <input type="text" class="form-control" name="telefono">
    
  </div>

  <div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones</label>
    <input type="text" class="form-control" name="observaciones">
    
  </div>

  
  
  <button type="submit" class="btn btn-primary">Crear</button>
</form>

  </div>
</div>

    </div>

  </div>

</div>




@endsection
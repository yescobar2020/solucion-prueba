@extends('layouts.menu')



@section('content')

<h1>nuevo servicio</h1>

<div class="card" style="width: 30rem;">
  <div class="card-body">
    
  <form action="{{ route('servicios.store')}}" method="post" enctype="multipart/form-data">
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
      <select class="form-select" aria-label="Default select example" name="tipo_id" id="tipo_id">
                <option value="">Seleccione tipo de servicio:</option>
                    @foreach($tipoServicios as $tipoServicio)
                        <option value="{{ $tipoServicio->id }}">{{ $tipoServicio->TipoServicio }}</option>
                    @endforeach
        </select>
    
  </div>

  <div class="mb-3">
    <label for="fechaInicio" class="form-label">Fecha de inicio</label>
    <input type="date" class="form-control" name="fechaInicio">
    
  </div>

  <div class="mb-3">
    <label for="fechaFin" class="form-label">Fecha Fin</label>
    <input type="date" class="form-control" name="fechaFin">
    
  </div>

  <div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones</label>
    <input type="text" class="form-control" name="observaciones">
    
  </div>

  
  
  <button type="submit" class="btn btn-primary">Crear</button>
</form>

  </div>
</div>


@endsection
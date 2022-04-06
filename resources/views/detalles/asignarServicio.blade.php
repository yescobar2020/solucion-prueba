@extends('layouts.menu')



@section('content')

<h1>nuevo servicio</h1>

<div class="card" style="width: 30rem;">
  <div class="card-body">
    
  <form action="{{ route('servicios.guardarAsignacion', $servicio->id)}}" method="post">
    @csrf
  

  

  <div class="mb-3">
      
        <label for="detalle_id" class="form-label">{{$servicio->nombre}}</label>
     <input type="text" class="form-control" id="" name="detalle_id" value="{{$servicio->id}}" disabled>
    
  </div>

  <div class="mb-3">
      <select class="form-select" aria-label="Default select example" name="clientes[]" id="">
                <option value="">Seleccione cliente:</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
        </select>
    
  </div>

  

  

  

  
  
  <button type="submit" class="btn btn-primary">Crear</button>
</form>

  </div>
</div>


@endsection
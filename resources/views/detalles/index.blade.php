@extends('layouts.menu')


@section('content')

<h1>lista de servicios</h1>
<br>
<a href="{{route('servicios.create')}}" class="btn btn-secondary">nuevo servicio</a>

<br>
<br>
<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Imagen</th>
      <th scope="col">Tipo de servicio</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Fecha  fin</th>
      <th scope="col">Observaciones</th>
      <th scope="col">acciones</th>
    </tr>
  </thead>
  <tbody>
      @foreach($servicios as $servicio)
       <tr>
        <th scope="row">{{$servicio->id}}</th>
        <th>{{$servicio->nombre}}</th>
        <th>
         <img src="{{asset('/imagenServicios' . '/' . $servicio->imagen )}}" class="img-thumbnail img-fluid" alt="" width="50">

        </th>
        <th>{{$servicio->tipo->TipoServicio}}</th>
        <th>{{$servicio->fechaInicio}}</th>
        <th>{{$servicio->fechaFin}}</th>
        <th>{{$servicio->observaciones}}</th>
        <th>
            <div class="d-grid gap-2 d-md-flex">
              <a href="{{route('servicios.edit', $servicio->id)}}" class="btn btn-warning">editar</a>
              <form action="" method="post">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro?')">Eliminar</button>
             </form>
               <a href="{{route('servicios.asignarServicios',$servicio->id)}}" class="btn btn-secondary">asignar servicio/cliente</a>



            </div>
        </th>
        
      </tr>
    @endforeach
    
  </tbody>
</table>


@endsection
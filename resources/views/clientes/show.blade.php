@extends('layouts.menu')


@section('content')

<h1>Detalles: servicios del cliente: {{$cliente->nombre}}</h1>
<br>

<br>
<br>
<table class="table table-success table-striped">
  <thead>
    <tr>
      
      <th scope="col">Nombre</th>
      <th scope="col">Imagen</th>
      <th scope="col">tipo de servicio</th>
      <th scope="col">fecha de inicio</th>
      <th scope="col">fecha fin</th>
      <th scope="col">Observaciones</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($servicios_by_clientes as $servicioCliente)
       <tr>
        <th scope="row">{{$servicioCliente->nombre}}</th>
        
        <th>
         <img src="{{asset('/imagenServicios' . '/' . $servicioCliente->imagen )}}" class="img-thumbnail img-fluid" alt="" width="50">

        </th>
        <th>{{$servicioCliente->tipo_id}}</th>

        <th>{{$servicioCliente->fechaInicio}}</th>
        <th>{{$servicioCliente->fechaFin}}</th>
        <th>{{$servicioCliente->observaciones}}</th>
        
        
        
      </tr>
    @endforeach
    
  </tbody>
</table>


@endsection
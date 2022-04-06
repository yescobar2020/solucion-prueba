@extends('layouts.menu')


@section('content')

<h1>lista de clientes</h1>
<br>
<a href="{{route('clientes.create')}}" class="btn btn-secondary">nuevo cliente</a>
<br>
<br>
<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Imagen</th>
      <th scope="col">Cedula</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Observaciones</th>
      <th scope="col">acciones</th>
    </tr>
  </thead>
  <tbody>
      @foreach($clientes as $cliente)
       <tr>
        <th scope="row">{{$cliente->id}}</th>
        <th>{{$cliente->nombre}}</th>
        <th>
         <img src="{{asset('/imagenCliente' . '/' . $cliente->imagen )}}" class="img-thumbnail img-fluid" alt="" width="50">

        </th>
        <th>{{$cliente->cedula}}</th>
        <th>{{$cliente->correo}}</th>
        <th>{{$cliente->telefono}}</th>
        <th>{{$cliente->observaciones}}</th>
        <th>
            <div class="d-grid gap-2 d-md-flex">
              <a href="{{route('clientes.edit',$cliente->id)}}" class="btn btn-warning">editar</a>
              <form action="{{ route('clientes.delete', $cliente->id)}}" method="post">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro?')">Eliminar</button>
             </form>
             <a href="{{route('clientes.show',$cliente->id)}}" class="btn btn-success">detalles</a>



            </div>
        </th>
        
      </tr>
    @endforeach
    
  </tbody>
</table>


@endsection
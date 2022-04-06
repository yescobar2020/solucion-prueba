@extends('layouts.menu')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inicio') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Sesión iniciada!') }}
                    <br>

                    <div>
                        <a href="{{route('clientes.index')}}" class="btn btn-primary">listar clientes</a>
                        <a href="{{route('servicios.index')}}" class="btn btn-primary">listar servicios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.main')

@section('title', 'Detalles de la Compra')

@section('content')

    <div class="container">

        <h1 class="text-center">¡Muchas gracias por su compra!</h1>
        <p class="text-center  text-light">Podés ver tu historial de compras en tu perfil</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('user.profile') }}" class="btn btn-primary">Ir a mi perfil</a>
        </div>



    </div>

@endsection

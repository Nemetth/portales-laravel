@extends('layouts.main')
@section('title', 'Éxito')
@section('content')
    <div class="status__container">
        <div class="container">

            <h1 class="text-center">Tu pago está pendiente</h1>
            <div class="d-flex justify-content-center">
                <a href="{{ route('cart.index') }}" class="btn btn-primary">Volver al carrito</a>
            </div>
        </div>
    @endsection

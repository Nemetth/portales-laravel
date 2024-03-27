@extends('layouts.main')
@section('title', 'Éxito')
@section('content')
    <div class="status__container">
        <div class="status__section">
            <div class="container">

                <h1 class="text-center">Pago fallido</h1>
                <p class="text-center  text-light">No se pudo realizar la compra</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('cart.index') }}" class="btn btn-primary">Volver al carrito</a>
                </div>

            </div>
        </div>
    @endsection

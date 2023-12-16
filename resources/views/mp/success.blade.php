@extends('layouts.main')
@section('title', 'Éxito')
@section('content')
    <div class="status__container">
        <div class="status__section">
            <h1>Pago exitoso</h1>
            <p>¡Gracias por tu compra! Acá están los detalles de tu pago:</p>
            <ul>
                <li>ID de compra: </li>
                <li>Nombre del producto: </li>
                <li>Precio: </li>
            </ul>
        </div>
    </div>
@endsection

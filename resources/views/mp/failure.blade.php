@extends('layouts.main')
@section('title', 'Éxito')
@section('content')
    <div class="status__container">
        <div class="status__section">
            <h1>Pago Fallido</h1>
            <p>No se pudo realizar la compra. Acá están los detalles de tu pago:</p>
            <ul>
                <li>Nombre del producto: </li>
                <li>Precio: </li>
            </ul>
        </div>
    </div>
@endsection

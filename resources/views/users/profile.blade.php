@extends('layouts.main')
@section('title', $user->name)
@section('content')
    <article class="container-fluid article-section__container">
        <div class="row article-section__text align-items-center">
            <div class="col-12 col-md">
                <h1 class="article__title">{{ $user->name }}</h1>
                <dl>
                    <dt class="hero-section__subtitle">Rol:
                        @if ($user->role == 1)
                            Administrador
                        @else
                            Usuario
                        @endif
                    </dt>

                    <dt class="hero-section__subtitle">Email: {{ $user->email }}</dt>
                    <dt class="hero-section__subtitle">Compras ({{ $purchases->count() }}):</dt>
                    <hr>
                    @if ($purchases->isEmpty())
                        <dd>No hay compras realizadas.</dd>
                    @else
                        @foreach ($purchases as $purchase)
                            <dt class="hero-section__subtitle">Compra ID: {{ $purchase->id }}</dt>
                            <dt class="hero-section__subtitle">Fecha de la compra: {{ $purchase->created_at }}</dt>
                            <dt class="hero-section__subtitle">Valor total de la compra: {{ $purchase->total_price }}</dt>
                            <dt class="hero-section__subtitle">Productos:</dt>
                            @foreach ($purchase->items as $item)
                                <dd>Nombre del producto: {{ $item->item_name }} - Cantidad: {{ $item->quantity }} - Valor
                                    total: {{ $item->item_price * $item->quantity }}</dd>
                            @endforeach
                            <hr>
                        @endforeach
                    @endif
                </dl>
                <a href="{{ route('user.edit.form', ['id' => $user->id]) }}" class="btn btn-primary w-25">Editar perfil</a>
            </div>

    </article>
@endsection

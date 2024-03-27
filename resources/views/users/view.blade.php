<?php
use App\Models\MagicProduct;
use Illuminate\Database\Eloquent\Collection;
/** @var User[]| Collection $user */
?>

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
                    <dt class="hero-section__subtitle">Email</dt>
                    <dd class="hero-section__subtitle">{{ $user->email }}</dd>
                    <dt class="hero-section__subtitle">Producto comprado:</dt>
                    @if ($purchases->isEmpty())
                        <dd>No hay artículos comprados.</dd>
                    @else
                        @foreach ($purchases as $purchase)
                            Fecha de la compra: {{ $purchase->created_at }}
                            ID de la compra: {{ $purchase->id }}
                            @foreach ($purchase->items as $item)
                                Nombre del producto: {{ $item->item_name }}
                            @endforeach
                        @endforeach
                    @endif
                </dl>
            </div>
    </article>
@endsection

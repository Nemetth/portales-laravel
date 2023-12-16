<?php
use Illuminate\Support\ViewErrorBag;
use App\Models\MagicProduct;
use App\Models\Rating;

/** @var MagicProduct $magic */
/** @var ViewErrorBag $errors */
/** @var Rating[]| Collection $Rating*/

?>

@extends('layouts.main')
@section('title', 'Servicios')
@section('content')
    <div class="container-fluid catalogo__container">
        <h1 class="hero-section__title text-center">Catálogo</h1>
        <div class="row justify-content-center">
            @foreach ($magicProduct as $magic)
                <div class="col-12 col-md d-flex flex-row justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $magic->image) }}" class="card-img-top" alt="{{ $magic->name }}">
                        <div class="card-body">
                            <h2 class="card-title">{{ $magic->name }}</h2>
                            <p class="card-text">$ {{ $magic->price }}</p>
                            <a href="{{ route('magic.view', ['id' => $magic->magic_id]) }}" class="catalogo__btn">Detalle</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

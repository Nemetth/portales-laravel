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
        <div class="row justify-content-around">
            @foreach ($magicProduct as $magic)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex flex-column align-items-center mb-4">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset('storage/' . $magic->image) }}" class="card-img-top" alt="{{ $magic->name }}">
                        <div class="card-body text-center">
                            <h2 class="card-title">{{ $magic->name }}</h2>
                            <p class="card-text">$ {{ $magic->price }}</p>
                            <a href="{{ route('magic.view', ['id' => $magic->magic_id]) }}" class="catalogo__btn">Ver
                                producto</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

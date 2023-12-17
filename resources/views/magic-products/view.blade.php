<?php
use App\Models\MagicProduct;
use Illuminate\Database\Eloquent\Collection;
/** @var MagicProduct[]| Collection $magicProduct */
?>

@extends('layouts.main')
@section('title', $magicProduct->name)
@section('content')
    <article class="container-fluid article-section__container">
        <div class="row article-section__text align-items-center">
            <div class="col-12 col-md">
                <h1 class="article__title">{{ $magicProduct->name }}</h1>
                <dl>
                    <dt class="hero-section__subtitle">Descripción</dt>
                    <dt class="hero-section__subtitle">{{ $magicProduct->description }}</dt>
                    <dt class="hero-section__subtitle">Precio</dt>
                    <dd class="hero-section__subtitle">$ {{ $magicProduct->price }}</dd>
                    <dt class="hero-section__subtitle">Caategoria</dt>
                    <dd class="hero-section__subtitle">{{ $magicProduct->duration }}</dd>
                    <dt class="hero-section__subtitle">Clasificación</dt>
                    <dd>{{ $magicProduct->rating->name }}</dd>
                    <dt class="hero-section__subtitle">Tipos</dt>
                    <dd>
                        @forelse($magicProduct->types as $type)
                            <span class="badge bg-secondary">{{ $type->name }}</span>
                        @empty
                            <i>Sin tipos</i>
                        @endforelse
                    </dd>
                </dl>
            </div>
            <div class="col-12 col-md">
                @if ($magicProduct->image !== null)
                    <img src="{{ asset('storage/' . $magicProduct->image) }}" alt="{{ $magicProduct->name }}"
                        class="img-fluid rounded">
                @else
                    Imagen default
                @endif
            </div>
            <div class="mt-5">
            </div>
        </div>

    </article>
@endsection

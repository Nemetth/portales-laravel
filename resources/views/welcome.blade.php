@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <h1 class="hidden">Portales</h1>
    <div class="hero-section__container">
        <div class="hero-section__text">
            <p class="hero-section__subtitle">En el umbral de lo desconocido</p>
            <h2 class="hero-section__title">la magia despierta</h2>
            <div class="hero-section__containerButtons">
                <a href="{{ route('magic.list') }}" class="hero-section__buttonStore">Tienda</a>
                <a href="{{ route('article.list') }}" class="hero-section__buttonArticle">Ir al blog</a>
            </div>
        </div>
    </div>

@endsection

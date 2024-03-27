<?php
use Illuminate\Support\ViewErrorBag;
use App\Models\Article;
use App\Models\Rating;

/** @var Article $article */
/** @var ViewErrorBag $errors */

?>

@extends('layouts.main')
@section('title', 'Servicios')
@section('content')

    <div class="news-section__container container-fluid">
        <div class="row">
            <h1 class="hero-section__title text-center w-100">Noticias</h1>
        </div>
        <div class="row justify-content-around">
            @foreach ($article as $new)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex flex-column align-items-center mb-4">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset('storage/' . $new->image) }}" class="card-img-top" alt="{{ $new->title }}">
                        <div class="card-body text-center">
                            <h2 class="card-title">{{ $new->title }}</h2>
                            <p class="card-text">{{ $new->subtitle }}</p>
                            <a href="{{ route('article.view', ['id' => $new->id]) }}" class="catalogo__btn">Leer</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

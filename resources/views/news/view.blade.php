<?php
/* use App\Models\article;
use Illuminate\Database\Eloquent\Collection; */
/** @var article[]| Collection $article */
?>

@extends('layouts.main')
@section('title', $article->name)
@section('content')

    <article class="article-section__container container-fluid">
        <div class="article-section__text row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="article__title text-center">{{ $article->title }}</h1>
                <h2 class="hero-section__subtitle text-center">{{ $article->subtitle }}</h2>
                <p class="text-center">{{ $article->created_at }}</p>
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->name }}" class="img-fluid rounded"
                        style="max-width: 100%; max-height: 500px; height: auto;">
                </div>
                <div class="mt-4">
                    {{ $article->body }}
                </div>
            </div>
        </div>
    </article>

@endsection

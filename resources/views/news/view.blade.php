<?php
/* use App\Models\article;
use Illuminate\Database\Eloquent\Collection; */
/** @var article[]| Collection $article */
?>

@extends('layouts.main')
@section('title', $article->name)
@section('content')

    <article class="article-section__container container-fluid">
        <div class="article-section__text row">
            <div class="col-12 col-md">
                <h1 class="article__title">{{ $article->title }}</h1>
                <h2 class="hero-section__subtitle">{{ $article->subtitle }}</h2>
                <p>{{ $article->created_at }}</p>
                <div>
                    {{ $article->body }}
                </div>
            </div>
        </div>
    </article>

@endsection

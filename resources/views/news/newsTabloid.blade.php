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
    <div class="row hero-section__text">
        <h1 class="hero-section__title text-center">Noticias</h1>
        @foreach($article as $new)
        <div class="col-12 col-md">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$new->title}}</h5>
                    <p class="card-text">{{$new->subtitle}}</p>
                    <a href="{{route('article.view', ['id'=>$new->id])}}" class="catalogo__btn">Leer</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

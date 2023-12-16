<?php
use App\Models\article;
use Illuminate\Database\Eloquent\Collection;
/**
 * @var article[]| Collection $article
 */
?>

@extends('layouts.main')
@section('title', $article->title)
@section('content')
    <section class="form__container container-fluid">
        <article class="row justify-content-center text-white ps-5 pt-5">
            <div class="col-md-12">
                <h1 class="mt-5">Eliminar artículo</h1>
                <p>Realmente desea eliminar el artículo. Confirmar</p>
                <h2>{{ $article->title }}</h2>
            </div>
            <div class="col-md-12 pt-5">
                <h2>Subtítulo</h2>
                <p>{{ $article->subtitle }}</p>
                <h2 class="mb-3">Texto</h2>
                <p>{{ $article->body }}</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 mb-5">
                    <h2>Confirmar</h2>
                    <p>¿Querés eliminar este registro?</p>
                    <h2>¿Querés eliminar este registro?</h2>
                    <form action="{{ route('article.delete.process', ['id' => $article->id]) }}" method="post">
                        @csrf
                        <button class="admin-section__btn" type="submit">Eliminar</button>
                    </form>
                </div>
            </div>
        </article>
    </section>
@endsection

<?php
/* use App\Models\Articles;
/** @var Article $article */
?>

@extends('layouts.main')
@section('content')
    <div class="article-section__container">
        <h1 class="hero-section__title m-3">Panel de administración de noticias</h1>
        <p class="ms-3"><a href="{{ route('article.create.form') }}" class="admin-section__btn p-2">Agregar entrada al blog</a></p>
        <div class="article-section__text table-responsive">
            <table class="admin-section__table mt-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Subtítulo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($article as $new)
                        <tr>
                            <td>{{ $new->id }}</td>
                            <td>{{ $new->title }}</td>
                            <td>{{ $new->subtitle }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('article.view', ['id' => $new->id]) }}" class="admin-section__btn">Ver
                                        entrada</a>
                                    <a href="{{ route('article.edit.form', ['id' => $new->id]) }}"
                                        class="admin-section__btn">Editar</a>
                                    <a href="{{ route('article.delete.form', ['id' => $new->id]) }}"
                                        class="admin-section__btn">Eliminar</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

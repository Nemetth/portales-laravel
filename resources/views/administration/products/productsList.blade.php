<?php
/* use App\Models\MagicProduct;
 use App\Models\Rating; */
use App\Models\MagicProduct;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
/** @var MagicProduct[]|Collection|LengthAwarePaginator $magicProduct */
?>

@extends('layouts.main')
@section('title', 'Panel de administración')
@section('content')
    <div class="article-section__container">
        <h1 class="hero-section__title m-3"> Panel de administración de productos</h1>
        <p class="ms-3"><a href="{{ route('magic.create.form') }}" class="admin-section__btn">Crear producto nuevo</a></p>
        <div class="article-section__text table-responsive">
            <table class="admin-section__table mt-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Categoria</th>
                        <th>Clasificación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magicProduct as $magic)
                        <tr>
                            <td>{{ $magic->magic_id }}</td>
                            <td>{{ $magic->name }}</td>
                            <td>{{ $magic->price }}</td>
                            <td>{{ $magic->description }}</td>
                            <td>{{ $magic->category->name }}</td>
                            <td>
                                @auth
                                    <div class="d-flex flex-wrap gap-2 ">
                                        <a href="{{ route('magic.view', ['id' => $magic->magic_id]) }}"
                                            class="admin-section__btn text-center">Ver artículo</a>
                                        <a href="{{ route('magic.edit.form', ['id' => $magic->magic_id]) }}"
                                            class="admin-section__btn text-center">Editar</a>
                                        <a href="{{ route('magic.delete.form', ['id' => $magic->magic_id]) }}"
                                            class="admin-section__btn text-center">Eliminar</a>
                                    </div>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="m-3">{{ $magicProduct->links() }}</div>
    </div>
@endsection

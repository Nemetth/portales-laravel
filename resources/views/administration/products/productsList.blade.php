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
    <div class="article-section__text table-responsive-md">
        <table class="admin-section__table mt-5">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Categoria</th>
                <th>Clasificación</th>
                <th>Tipos</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($magicProduct as $magic)
                <tr>
                <td>{{$magic->magic_id}}</td>
                <td>{{$magic->name}}</td>
                <td>{{$magic->price}}</td>
                <td>{{$magic->description}}</td>
                <td>{{$magic->category}}</td>
                <td>{{$magic->rating->name}}</td>
                <td>
                    @forelse ($magic->types as $type)
                    <span class="badge bg-secondary">{{ $type->name }}</span>
                    @empty
                        <i>Sin tipos</i>
                    @endforelse
                </td>
                <td>
                    @auth
                        <form action="{{ route('magic.reservation', ['id' => $magic->magic_id]) }}" method="post">
                        @csrf
                            <button type="submit" class="admin-section__btn text-center">Reservar</button>
                        </form>
                        <div class="d-flex gap-2">
                            <a href="{{route('magic.view',  ['id'=>$magic->magic_id])}}" class="admin-section__a text-center">Ver artículo</a>
                            <a href="{{route('magic.edit.form',  ['id'=>$magic->magic_id])}}" class="admin-section__btn text-center">Editar</a>
                            <a href="{{route('magic.delete.form',  ['id'=>$magic->magic_id])}}" class="admin-section__btn text-center">Eliminar</a>
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

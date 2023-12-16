<?php
use App\Models\MagicProduct;
use Illuminate\Database\Eloquent\Collection;
/**
 * @var MagicProduct[]| Collection $magicProduct
 */
?>

@extends('layouts.main')
@section('title', $magicProduct->name)
@section('content')
    <section class="form__container container-fluid">
        <article class="row justify-content-center text-white ps-5 pt-5">
            <div class="col-md-12">
                <h1 class="mt-5">Eliminar producto</h1>
                <p>Realmente desea eliminar la película. Confirmar</p>
                <h2>{{ $magicProduct->name }}</h2>
                <dl>
                    <dt>Precio</dt>
                    <dd>$ {{ $magicProduct->price }}</dd>
                    <dt>Categoria</dt>
                    <dd>{{ $magicProduct->category }}</dd>
                </dl>
            </div>
            <div class="col-md-12 pt-5">
                <h2>Descripción</h2>
                <div>
                    {{ $magicProduct->description }}
                </div>
                @if ($magicProduct->image !== null)
                    <img src="{{ asset('storage/' . $magicProduct->image) }}" alt="{{ $magicProduct->name }}" class="img-fluid">
                @else
                    Imagen default
                @endif
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2>Confirmar</h2>
                    <p>¿Querés eliminar este registro?</p>
                    <form action="{{ route('magic.delete.process', ['id' => $magicProduct->magic_id]) }}" method="post">
                        @csrf
                        <button class="admin-section__btn" type="submit">Eliminar</button>
                    </form>
                </div>
            </div>
        </article>
    </section>
@endsection

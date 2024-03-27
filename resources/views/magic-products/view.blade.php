<?php
use App\Models\MagicProduct;
use Illuminate\Database\Eloquent\Collection;
/** @var MagicProduct[]| Collection $magicProduct */
?>

@extends('layouts.main')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', $magicProduct->name)
@section('content')
    <article class="container-fluid article-section__container">
        <div class="row article-section__text align-items-center">
            <div class="col-12 col-md article__view">
                <h1 class="article__title">{{ $magicProduct->name }}</h1>
                <dl>
                    <dt class="hero-section__subtitle">Descripción</dt>
                    <dt class="hero-section__body">{{ $magicProduct->description }}</dt>
                    <dt class="hero-section__price">Precio</dt>
                    <dd class="hero-section__price">$ {{ $magicProduct->price }}</dd>
                    <dt class="hero-section__category">Categoría</dt>
                    <dd>{{ $magicProduct->category ? $magicProduct->category->name : 'Sin categoría' }}</dd>
                </dl>
            </div>
            <div class="col-12 col-md">
                @if ($magicProduct->image !== null)
                    <img src="{{ asset('storage/' . $magicProduct->image) }}" alt="{{ $magicProduct->name }}"
                        class="img-fluid rounded">
                @else
                    Imagen default
                @endif
            </div>
            <div class="mt-5">
                <form method="POST" action="{{ route('cart.add') }}">
                    @csrf
                    <input type="hidden" name="magic_id" value="{{ $magicProduct->magic_id }}">
                    <input type="hidden" name="name" value="{{ $magicProduct->name }}">
                    <button type="button" class="btn btn-primary" onclick="addToCart()">Agregar al carrito</button>

                </form>
            </div>
        </div>

    </article>
@endsection
<script>
    function addToCart() {
        @if (Auth::guest())
            window.location.href = "{{ route('auth.login.form') }}";
        @else
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "{{ route('cart.add') }}", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    swal("¡Buen trabajo!", "Producto agregado al carrito", "success");
                }
            }
            xhr.send("magic_id={{ $magicProduct->magic_id }}&name={{ $magicProduct->name }}");
        @endif
    }
</script>

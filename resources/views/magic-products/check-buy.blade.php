<?php
use App\Models\MagicProduct;

/** @var MagicProduct $magicProduct */

?>
@extends('layouts.main')

@section('title', 'Confirmación de compra')

@section('content')
    <section class="container-fluid hero-section__container text-white">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <h1 class="mb-3">Confirmación Necesaria</h1>

                <p class="mb-3">El sitio web opera en Argentina, solo realizamos envíos. Para evitar confusiones,
                    solicitamos tu confirmación</p>

                <form action="{{ route('magic-products.check-buy.process', ['id' => $magicProduct->magic_id]) }}"
                    method="post">
                    @csrf
                    <button type="submit" class="hero-section__buttonStore">Entiendo, confirmo que resido en
                        Argentina</button>
                    <a href="{{ route('magic.list') }}" class="hero-section__buttonArticle">Cancelar</a>
                </form>
            </div>
        </div>
    </section>
@endsection

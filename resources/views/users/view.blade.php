<?php
use App\Models\MagicProduct;
use Illuminate\Database\Eloquent\Collection;
/** @var User[]| Collection $user */
?>

@extends('layouts.main')
@section('title', $user->name)
@section('content')
<article class="container-fluid article-section__container">
    <div class="row article-section__text align-items-center">
        <div class="col-12 col-md">
            <h1 class="article__title">{{$user->name}}</h1>
            <dl>
                <dt class="hero-section__subtitle">Rol</dt>
                <dt class="hero-section__subtitle">{{$user->role}} - {{$user->name}}</dt>
                <dt class="hero-section__subtitle">Email</dt>
                <dd class="hero-section__subtitle">{{$user->email}}</dd>
                <dt class="hero-section__subtitle">Producto comprado:</dt>
                @foreach($purchases as $product)
                    <dt class="hero-section__subtitle">{{$product->product->name}}</dt>
                @endforeach
            </dl>
        </div>
</article>
@endsection

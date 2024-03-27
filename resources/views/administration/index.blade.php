@extends('layouts.main')
@section('title', 'Panel de administración')
@section('content')
    <div class="pt-5 admin-section__container d-flex align-items-center justify-content-center container-fluid">
        <div class="d-flex flex-row gap-5 justify-content-center row">
            <h1 class="hero-section__title text-center">¿Qué desea administrar?</h1>
            <div class="col">
                <div class="admin-section__card col">
                    <a href="{{ route('magic.panel') }}">Administrar productos mágicos</a>
                </div>
            </div>
            <div class="admin-section__card col">
                <a href="{{ route('article.panel') }}">Administrar noticias mágicas</a>
            </div>
            <div class="admin-section__card col">
                <a href="{{ route('users.panel') }}">Lista de usuarios</a>
            </div>
            <div class="admin-section__card col">
                <a href="{{ route('dashboard.index') }}">Estadísticas</a>
            </div>
        </div>
    </div>
    </div>
@endsection

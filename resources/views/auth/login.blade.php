@extends('layouts.main')

@section('title', 'Iniciar Sesión')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section>
        <div class="hero-section__container container-fluid d-flex align-items-center">
            <h1 class="text-center hero-section__title">Atravesar el portal de ingreso</h1>
            <div class="row hero-section__tex flex">
                <div class="col">
                    <form action="{{ url('/iniciar-sesion') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @if (\Session::has('status.message'))
                                <div class="text-danger">{!! \Session::get('status.message') !!}</div>
                            @endif
                        </div>
                        <button type="submit" class="hero-section__buttonStore">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

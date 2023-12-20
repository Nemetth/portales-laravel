@extends('layouts.main')

@section('title', 'Registro')

@section('content')
  
    <section>
        <div class="hero-section__container container-fluid d-flex align-items-center">
            <h1 class="text-center hero-section__title">Atravesar el portal de registro</h1>
            <div class="row hero-section__tex flex">
                <div class="col">
                    <form action="{{ route('auth.register.process') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Nombre</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label text-white">Confirmar Contraseña</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control">
                        </div>
                          @if ($errors->any())
                            <div class="text-danger">
                                <ul class="p-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        <button type="submit" class="hero-section__buttonStore">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

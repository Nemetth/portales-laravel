<?php
use Illuminate\Support\ViewErrorBag;
use App\Models\Users;
use Illuminate\Database\Eloquent\Collection;
/**
 * @var ViewErrorBag $errors
 *  @var User[]| Collection $user
 */
?>
@extends('layouts.main')
@section('title', 'Editar perfil')
@section('content')
    <section class="form__container container-fluid vh-100">
        <div class="row justify-content-center text-white pt-5">
            <div class="col-lg-8">
                <h1 class="mb-3 mt-5">Editar mi perfil</h1>
                @if ($errors->any())
                    <div class="text-danger">Ocurrieron uno o más errores de validación. Intente nuevamente</div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-white">
                <form action="{{ route('user.edit.process', ['id' => $user->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ old('name', $user->name) }}"
                            @error('name')
        aria-describedby="error-name"
        aria-invalid="true"
        @enderror>
                        @error('name')
                            <div class="text-danger" id="error-name">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" class="form-control"
                            value="{{ old('email', $user->email) }}"
                            @error('email')
                    aria-describedby="error-email"
                    aria-invalid="true"
                    @enderror>
                        @error('email')
                            <div class="text-danger" id="error-email">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control"
                            @error('password')
                    aria-describedby="error-password"
                    aria-invalid="true"
                    @enderror></input>
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @error('password')
                            <div class="text-danger" id="error-password">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                            @error('password_confirmation')
                    aria-describedby="error-password_confirmation"
                    aria-invalid="true"
                    @enderror></input>
                        <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @error('password_confirmation')
                            <div class="text-danger" id="error-password_confirmation">{{ $message }}</div>
                        @enderror
                    </div>

            </div>
            <button type="submit" class="admin-section__btn">Editar</button>
            </form>
        </div>
        </div>
    </section>
@endsection

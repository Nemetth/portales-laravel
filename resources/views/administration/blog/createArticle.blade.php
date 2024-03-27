<?php
use Illuminate\Support\ViewErrorBag;
use App\Models\MagicProduct;
use Illuminate\Database\Eloquent\Collection;
/**
 * @var ViewErrorBag $errors
 * @var Rating[]| Collection $ratings
 */
?>
@extends('layouts.main')
@section('title', 'Crear noticia')
@section('content')
    <section class="form__container container-fluid vh-100">
        <div class="row justify-content-center text-white pt-5">
            <div class="col-lg-8 mt-5">
                <h1 class="mb-3">Nueva noticia</h1>
                @if ($errors->any())
                    <div class="text-danger">Ocurrieron uno o más errores de validación. Intente nuevamente</div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-white">
                <form action="{{ route('article.create.process') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}"
                            @error('title')
                    aria-describedby="error-title"
                    aria-invalid="true"
                    @enderror>
                        @error('title')
                            <div class="text-danger" id="error-title">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtitulo</label>
                        <input type="text" id="subtitle" name="subtitle" class="form-control"
                            value="{{ old('subtitle') }}"
                            @error('subtitle')
                    aria-describedby="error-subtitle"
                    aria-invalid="true"
                    @enderror>
                        @error('subtitle')
                            <div class="text-danger" id="error-subtitle">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Texto de la noticia</label>
                        <textarea type="text" id="body" name="body" class="form-control"
                            @error('body')
                    aria-describedby="error-body"
                    aria-invalid="true"
                    @enderror>{{ old('body') }}</textarea>
                        @error('body')
                            <div class="text-danger" id="error-body">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Imagen de la noticia</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <button type="submit" class="admin-section__btn">Crear</button>
                </form>
            </div>
        </div>
    </section>
@endsection

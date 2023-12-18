<?php
use Illuminate\Support\ViewErrorBag;
use App\Models\MagicProduct;
use App\Models\Rating;
use App\Models\Type;

/** @var Movie $movie */
/** @var ViewErrorBag $errors */
/** @var Rating[]| Collection $Rating*/
/** @var Type[]| Collection $Types*/

?>

@extends('layouts.main')
@section('title', 'Editar producto')
@section('content')
    <section class="form__container container-fluid">
        <div class="row justify-content-center text-white pt-5">
            <div class="col-lg-8">
                <h1 class="mb-3 mt-5">Editar {{ $magicProduct->name }}</h1>
                @if ($errors->any())
                    <div class="text-danger">Ocurrieron uno o más errores de validación. Intente nuevamente</div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-white">
                <form action="{{ route('magic.edit.process', ['id' => $magicProduct->magic_id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ old('name', $magicProduct->name) }}"
                            @error('name')
                    aria-describedby="error-name"
                    aria-invalid="true"
                    @enderror>
                        @error('name')
                            <div class="text-danger" id="error-name">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" id="price" name="price" class="form-control"
                            value="{{ old('price', $magicProduct->price) }}"
                            @error('price')
                    aria-describedby="error-price"
                    aria-invalid="true"
                    @enderror>
                        @error('price')
                            <div class="text-danger" id="error-price">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea type="text" id="description" name="description" class="form-control"
                            @error('description')
                    aria-describedby="error-description"
                    aria-invalid="true"
                    @enderror>{{ old('description', $magicProduct->description) }}</textarea>
                        @error('description')
                            <div class="text-danger" id="error-description">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rating_id" class="form-label">Clasificación</label>
                        <select id="rating_id" name="rating_id" class="form-control"
                            @error('rating_id')
                    aria-describedby="error-rating_id"
                    aria-invalid="true"
                    @enderror>
                            <option>Seleccioná la clasificación</option>
                            @foreach ($ratings as $rating)
                                <option value="{{ $rating->rating_id }}" @selected($rating->rating_id == old('rating_id', $magicProduct->rating_id))>{{ $rating->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('rating_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Categoria</label>
                        <input type="text" id="category" name="category" class="form-control"
                            value="{{ old('category', $magicProduct->category) }}"
                            @error('category')
                    aria-describedby="error-category"
                    aria-invalid="true"
                    @enderror>
                        @error('duration')
                            <div class="text-danger" id="error-duration">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="mb-2">Portada Actual</div>
                        @if ($magicProduct->image != null && Storage::has($magicProduct->image))
                            <img src="{{ asset('storage/' . $magicProduct->image) }}" class="d-table mx-auto" style="width: 50%;" alt="{{ $magicProduct->name }}">
                        @else
                            <p>El producto no tiene imagen</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Imagen del producto</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <fieldset class="mb-3">
                        <legend>Tipos</legend>
                        @foreach ($types as $type)
                            <label class="me-2">
                                <input type="checkbox" name="types[]" class="form-check-input"
                                    value="{{ $type->types_id }}" @checked(in_array($type->types_id, old('types', $magicProduct->types->pluck('types_id')->all())))>
                                {{ $type->name }}
                            </label>
                        @endforeach
                    </fieldset>
                    <button type="submit" class="admin-section__btn">Editar</button>
                </form>
            </div>
        </div>
    </section>
@endsection

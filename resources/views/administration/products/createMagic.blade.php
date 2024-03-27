<?php
use Illuminate\Support\ViewErrorBag;
use App\Models\MagicProduct;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;
/**
 * @var ViewErrorBag $errors
 * @var category[]| Collection $category
 */
?>
@extends('layouts.main')
@section('title', 'Crear producto')
@section('content')
    <section class="form__container container-fluid">
        <div class="row justify-content-center text-white pt-5">
            <div class="col-lg-8">
                <h1 class="mb-3 mt-5">Nuevo producto</h1>
                @if ($errors->any())
                    <div class="text-danger">Ocurrieron uno o más errores de validación. Intente nuevamente</div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-white">
                <form action="{{ route('magic.create.process') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
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
                        <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}"
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
                    @enderror>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger" id="error-description">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categoría</label>
                        <select id="category_id" name="category_id" class="form-control"
                            @error('category_id')
                    aria-describedby="error-category_id"
                    aria-invalid="true"
                    @enderror>
                            <option>Seleccioná la categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}" @selected($category->category_id == old('category_id'))>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Imagen del producto</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>

                    <button type="submit" class="admin-section__btn">Crear</button>
                </form>
            </div>
        </div>
    </section>
@endsection

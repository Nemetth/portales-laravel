<?php
/* use App\Models\MagicProduct;
 use App\Models\Rating; */
use App\Models\MagicProduct;
use Illuminate\Database\Eloquent\Collection;
/** @var users[]|Collection */
?>

@extends('layouts.main')
@section('title', 'Panel de administración')
@section('content')
    <div class="article-section__container">
        <h1 class="hero-section__title m-3"> Panel de administración de usuarios</h1>
        <div class="article-section__text table-responsive-md">
            <table class="admin-section__table mt-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->user_id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @auth
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('user.view', ['id' => $user->user_id]) }}"
                                            class="admin-section__btn text-center">Ver usuario</a>
                                    </div>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

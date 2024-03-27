<?php
use App\Models\MagicProduct;
use Illuminate\Database\Eloquent\Collection;
/** @var MagicProduct[]| Collection $magicProduct */
/** @var int|float $totalPrice */
/** @var Preference $preference */
/** @var string $mpPublicKey */
?>

@extends('layouts.main')
@section('title', 'Integración con Mercado Pago')
@section('content')
    <article class="article-section__container">
        <h1 class="hero-section__title m-3">Completá tu pago</h1>
        <div class="article-section__text table-responsive-md">
            <table class="admin-section__table mt-5">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magicProduct as $magic)
                        <tr>
                            <td>{{ $magic->name }}</td>
                            <td>${{ $magic->price }}</td>
                            <td>1</td>
                            <td>${{ $magic->price * 1 }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"><b>TOTAL:</b></td>
                        <td><b>${{ $totalPrice }}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="contianer--btn">
            <div id="checkout"></div>
        </div>
    </article>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('<?= $mpPublicKey ?>');
        mp.bricks().create('wallet', 'checkout', {
            initialization: {
                preferenceId: '<?= $preference->id ?>',
            },
        });
    </script>
@endsection

@extends('layouts.main')
@section('title', 'Carrito')
@section('content')
    <article class="container-fluid article-section__container">
        <div class="row article-section__text align-items-center">
            @if (count($cartItems) === 0)
                <div>
                    No hay productos en el carrito
                </div>
                <a href="{{ route('home') }}" class="btn btn-primary w-25 mt-5">Volver al inicio</a>
            @else
                @if (session()->has('message'))
                    <div class="alert alert-{{ session('alert-type', 'info') }}" role="alert">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio por unidad</th>
                            <th>Precio total por producto </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->price * $item->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="alert alert-success" role="alert">
                    Total: ${{ $totalPrice }}
                </div>

                <div id="checkout" class=""></div>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Vaciar carrito</button>
                </form>

                <script src="https://sdk.mercadopago.com/js/v2"></script>
                <script>
                    const mp = new MercadoPago('<?= $mpPublicKey ?>');
                    if ({{ count($cartItems) }} > 0) {
                        mp.checkout({
                            preference: {
                                id: '<?= $preference->id ?>'
                            },
                            render: {
                                container: '#checkout',
                                label: 'Pagar',
                            }
                        });
                    }
                </script>
            @endif
        </div>
        <section>
    </article>
@endsection

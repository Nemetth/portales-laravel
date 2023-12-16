<?php
use App\Models\MagicProduct;
/** @var Magic $magic */
?>
<div>
    <h1>La Reserva del Producto fue Exitoso</h1>

    <p>Tu reserva de <b>{{ $magic->name }}</b> se registró con éxito.</p>

    <p>Los datos del producto son:</p>

    <dl>
        <dt>Precio</dt>
        <dd>$ {{ $magic->price }}</dd>
        <dt>Descripcion</dt>
        <dd>{{ $magic->description }}</dd>
        <dt>Categoria</dt>
        <dd>{{ $magic->category }}</dd>
        <dt>Tipos</dt>
        <dd>
            @forelse($magic->types as $type)
                <span>{{ $type->name }}</span>
            @empty
                <i>Sin tipos</i>
            @endforelse
        </dd>
    </dl>

    <p>Guardá este email como comprobante.</p>

    <p>
        Atentamente,<br>
        Portales.
    </p>
</div>

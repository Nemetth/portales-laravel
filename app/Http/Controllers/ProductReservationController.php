<?php

namespace App\Http\Controllers;

use App\Mail\ProductReserved;
use App\Models\MagicProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductReservationController extends Controller
{
    public function sendConfirmation(Request $request, int $id)
    {
        $magic_products = MagicProduct::findOrFail($id);
        //Enviamos el mail
        Mail::to($request->user())->send(new ProductReserved($magic_products));
        return redirect()
            ->route('magic.view', ['id' => $id])
            ->with('status.message', 'El producto <b>' . e($magic_products->title) . '</b> se reservó con éxito');
    }
}

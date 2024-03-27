<?php

namespace App\Http\Controllers;

use App\Models\MagicProduct;
use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class MercadoPagoController extends Controller
{
    public function showForm()
    {
        $magicProduct = MagicProduct::whereIn('magic_id', [1, 3])->get();

        $items = [];
        $totalPrice = 0;

        foreach ($magicProduct as $magic) {
            $items[] = [
                'title' => $magic->name,
                'quantity' => 1,
                'currency_id' => 'ARS',
                'unit_price' => $magic->price,
            ];
            $totalPrice += $magic->price * 1;
        }

        MercadoPagoConfig::setAccessToken(config('mercadopago.acessToken'));

        $client = new PreferenceClient();
        $preference = $client->create([
            'items' => $items,
            'back_urls' => [
                'success' => route('mp.success'),
                'pending' => route('mp.pending'),
                'failure' => route('mp.failure'),
            ],
        ]);

        return view('mp.form', [
            'magicProduct' => $magicProductphp -vb,
            'totalPrice' => $totalPrice,
            'preference' => $preference,
            'mpPublicKey' => config('mercadopago.publicKey'),
        ]);
    }

    public function success(Request $request)
    {
        return view('mp.success', ['request' => $request]);
    }

    public function pending(Request $request)
    {
        return view('mp.pending', ['request' => $request]);
    }

    public function failure(Request $request)
    {
        return view('mp.failure', ['request' => $request]);
    }
    
    public function viewComplete()
    {
    return view('mp.complete');
    }
}



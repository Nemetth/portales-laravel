<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MagicProduct;
use App\Models\CartItem;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\SDK;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;




class CartController extends Controller
{

public function view()
{
    $userId = auth()->id(); 
    $cartItems = CartItem::where('user_id', $userId)->get(); 

    $items = [];
    $totalPrice = 0;

    foreach($cartItems as $item) {
        $product = $item->magicProduct; 

        $items[] = [
            'title' => $product->name,
            'quantity' => $item->quantity,
            'currency_id' => 'ARS',
            'unit_price' => $product->price,
        ];
        
        $totalPrice += $product->price * $item->quantity;
    }

    $preference = null;
    if (count($items) > 0) {
        MercadoPagoConfig::setAccessToken(config('mercadopago.accessToken'));
        $client = new PreferenceClient();
        $preference = $client->create([
            'items' => $items,
            'back_urls' => [
                'success' => route('mp.success'),
                'pending' => route('mp.pending'),
                'failure' => route('mp.failure'),
            ],
        ]);
    }

    return view('cart.index', compact('cartItems'), [
        'totalPrice' => $totalPrice,
        'preference' => $preference,
        'mpPublicKey' => config('mercadopago.publicKey'),
    ]);
}

   public function addToCart(Request $request)
{
    $product = MagicProduct::findOrFail($request->magic_id);
    $userId = auth()->id(); 


    $cartItem = CartItem::where('magic_id', $request->magic_id)->where('user_id', $userId)->first();
    if($cartItem) {
        $cartItem->quantity++;
    } else {
        $cartItem = new CartItem;
        $cartItem->magic_id = $request->magic_id;
        $cartItem->user_id = $userId;
        $cartItem->name = $product->name;
        $cartItem->quantity = 1;
        $cartItem->price = $product->price;
    }
    $cartItem->save();

    return response()->json(['success' => 'Product added to cart successfully!']);
}

public function completePurchase()
{
    $userId = auth()->id(); 
    $cartItems = CartItem::where('user_id', $userId)->get();


    $purchase = new Purchase;
    $purchase->user_id = $userId;
    $purchase->total_price = $cartItems->sum(function ($item) {
        return $item->price * $item->quantity;
    });
    $purchase->save();


    foreach ($cartItems as $cartItem) {
        $purchaseItem = new PurchaseItem;
        $purchaseItem->purchase_id = $purchase->id;
        $purchaseItem->item_name = $cartItem->name;
        $purchaseItem->item_price = $cartItem->price;
        $purchaseItem->quantity = $cartItem->quantity;
        $purchaseItem->save();
    }


    CartItem::where('user_id', $userId)->delete();

    return redirect()->route('mp.complete')->with('success', 'Compra completada');
}



public function removeFromCart(Request $request)
{

}



public function clearCart()
{
    $userId = auth()->id(); 
    CartItem::where('user_id', $userId)->delete();

    return redirect()->route('cart.index')->with('success', 'Carrito vaciado con éxito!');

}

}
<?php

namespace App\Http\Middleware;

use App\Models\MagicProduct;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckBuy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route()->parameter('id');
        $magic_product = MagicProduct::findOrFail($id);

        if (($magic_product->magic_id === 1 || $magic_product->magic_id === 2 || $magic_product->magic_id === 4) && !Session::get('confirmed', false)) {
            return redirect()
                ->route('magic-products.check-buy.form', ['id' => $id]);
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MagicProduct;
use Illuminate\Support\Facades\Session;

class CheckBuyController extends Controller
{
    public function showForm(int $id)
    {
        return view('magic-products.check-buy', [
            'magicProduct' => MagicProduct::findOrFail($id),
        ]);
    }

    public function confirmProcess(int $id)
    {
        Session::put('confirmed', true);

        return redirect()
            ->route('magic.view', ['id' => $id]);
    }
}

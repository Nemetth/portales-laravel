<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Purchase;
use App\Models\PurchaseItem;

class DashboardController extends Controller
{
public function index()
{
    $totalUsers = User::count();
    $totalPurchases = Purchase::count();
    $totalSales = Purchase::sum('total_price');

    $salesData = Purchase::selectRaw('MONTH(created_at) as month, SUM(total_price) as sales')
        ->groupBy('month')
        ->get()
        ->pluck('sales', 'month');

    $productCounts = PurchaseItem::selectRaw('item_name, SUM(quantity) as quantity')
        ->groupBy('item_name')
        ->get()
        ->pluck('quantity', 'item_name');

    // Recupera el porcentaje de ingresos que representa cada producto
    $productSalesData = PurchaseItem::selectRaw('item_name, SUM(item_price * quantity) as sales')
        ->groupBy('item_name')
        ->get();
    $productSales = $productSalesData->mapWithKeys(function ($sale) use ($totalSales) {
        return [$sale->item_name => $sale->sales / $totalSales * 100];
    });

    return view('administration.dashboard.index', compact('totalUsers', 'totalPurchases', 'totalSales', 'salesData', 'productCounts', 'productSales'));
}


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'item_name',
        'item_price',
        'quantity',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}

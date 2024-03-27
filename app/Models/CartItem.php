<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    
    public function magicProduct()
{
    return $this->belongsTo(MagicProduct::class, 'magic_id', 'magic_id');
}
}

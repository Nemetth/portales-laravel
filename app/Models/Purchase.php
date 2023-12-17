<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'users_have_products';
    protected $primaryKey = 'purchase_id';

    protected $fillable = [
        'purchase_id',
        'user_id',
        'magic_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(MagicProduct::class, 'magic_id');
    }
}

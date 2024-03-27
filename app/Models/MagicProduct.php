<?php

namespace App\Models;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;

class MagicProduct extends Model
{
    protected $table = 'magic_products';
    protected $primaryKey = 'magic_id';

    protected $fillable = ["name", "price", "description", "category_id", "image"];

    public const VALIDATION_RULES = [
        // 'title' => ['required', 'min:2'],
        'name' => 'required|min:2',
        'price' => 'required|numeric',
        'description' => 'required',
        "category_id" => 'required|exists:categories',
    ];

    public const VALIDATION_MESSAGES = [
        'name.required' => 'El producto debe tener un nombre.',
        'name.min' => 'El producto debe tener al menos dos caracteres',
        'price.required' => 'El precio del producto no puede quedar vacío.',
        'price.numeric' => 'El precio debe ser un número.',
        'category.required' => 'Debe tener una categoria',
        'description.required' => 'La descripción no puede estar vacía.',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', "category_id");
    }


    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'users_have_products',
            'magic_id',
            'user_id',
        )->withTimestamps();
    }
}

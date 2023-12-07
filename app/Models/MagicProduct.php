<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Casts\Attribute;
use \Illuminate\Database\Eloquent\Concerns\HasAttributes;



class MagicProduct extends Model
{
    protected $table = 'magic_products';
    protected $primaryKey = 'magic_id';

    protected $fillable = ["name", "price", "description", "category", "image", "rating_id" ];

    public const VALIDATION_RULES = [
        // 'title' => ['required', 'min:2'],
        'name' => 'required|min:2',
        'price' => 'required|numeric',
        'category' => 'required',
        'description'=> 'required',
        "rating_id"=> 'required|exists:ratings'
    ];

    public const VALIDATION_MESSAGES = [
        'name.required' => 'El producto debe tener un nombre.',
        'name.min' => 'El producto debe tener al menos dos caracteres',
        'price.required' => 'El precio del producto no puede quedar vacío.',
        'price.numeric' => 'El precio debe ser un número.',
        'category.required'=> 'Debe tener una categoria',
        'description.required' => 'La descripción no puede estar vacía.',
        'rating_id.required' => 'Debes seleccionar una clasificación',
        'rating_id.required' => 'La clasificación seleccionada no existe',
    ];


    public function rating()
    {
        return $this->belongsTo(Rating::class, 'rating_id', "rating_id");
    }

    public function types()
    {
        return $this->belongsToMany(
            Type::class,
            'products_have_types',
            'magic_id',
            'types_id',
        );
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

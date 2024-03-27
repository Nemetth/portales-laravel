<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ["title", "subtitle", "body", "image"];

    public const VALIDATION_RULES = [
        'title' => 'required|min:5',
        'subtitle' => 'required',
        'body' => 'required',
    ];

    public const VALIDATION_MESSAGES = [
        'author.required' => 'Debe señalarse el autor del artículo',
        'author.min' => 'El nombre del autor debe tener al menos dos caracteres',
        'title.required' => 'El artículo debe tener un título',
        'title.min' => 'El título del artículo debe tener un mínimo de 5 caracteres',
        'subtitle.required' => 'El artículo debe tener un subtítulo',
        'body.required' => 'El artículo debe tener un contenido',
    ];

}

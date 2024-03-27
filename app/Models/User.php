<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public const VALIDATION_RULES = [
    'email' => 'required',
    'name' => 'required',
    'password' => 'required|confirmed',
    ];

    public const VALIDATION_MESSAGES = [
    'email.required' => 'El usuario es obligatorio',
    'name.required' => 'El nombre es obligatorio',
    'password.required' => 'La contraseña es obligatoria',
    'password.confirmed' => 'La contraseña y la confirmación de la contraseña no coinciden',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}

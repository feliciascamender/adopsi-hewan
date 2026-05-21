<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isAdopter(): bool
    {
        return $this->role === 'adopter';
    }
}

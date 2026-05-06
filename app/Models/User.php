<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone', 'address'
    ];

    protected $hidden = ['password'];

    protected function casts(): array
    {
        return ['password' => 'hashed'];
    }

    // Satu user (adopter) bisa punya banyak pengajuan adopsi
    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    // Helper: cek apakah user adalah admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $fillable = ['name', 'description'];

    // Satu spesies banyak hewan (one to many)
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionDetail extends Model
{
    protected $fillable = ['adoption_id', 'animal_id'];
   
    public function adoption()
    {
        return $this->belongsTo(Adoption::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}

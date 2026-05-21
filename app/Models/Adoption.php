<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'ktp_address',
        'house_photo',
        'reason',
        'status',
        'admin_note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'adoption_details')
            ->withTimestamps();
    }
}

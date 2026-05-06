<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected  $fillable = ['user_id', 'ull_name', 'ktp_address', 'house_photo', 'reason', 'status', 'admin_note'];

    //pengajuan milik satu adopter (one to many)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //satu pengajuan bisa memuat bnyk hewan
    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'adoption_details');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'species_id',
        'name',
        'gender',
        'age_months',
        'description',
        'status',
        'photo',
    ];

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function adoptions()
    {
        return $this->belongsToMany(Adoption::class, 'adoption_details')
            ->withTimestamps();
    }
}

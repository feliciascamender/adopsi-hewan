<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [ 'species_id', 'name', 'gander', 'age_months', 'description', 'description', 'status', 'photo_path' ];
    
    //animal from oe's species
    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    //satu bola bulu bisa punya banyak riwayat medis (One to many)
    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    //bola bulu bisa da di banyak pengajuan (many to many)
    public function adoptions()
    {
        return $this->belongsToMany(Adoption::class, 'adoption_details');
    }
}

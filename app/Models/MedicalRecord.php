<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $fillable = ['animal_id', 'title', 'notes', 'record_date'];
    protected $casts = ['record_date' => 'date'];

    //Riwayat medis satu bola bulu
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}

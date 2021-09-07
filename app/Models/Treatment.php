<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $table = "treatment";
    
    public $timestamps = false; //si está en true no me deja modificar el formato de la fecha

    protected $fillable = [
        'external_id', 'dentist_id', 'patient_id', 'plates', 'created_at', 'updated_at', 'ended_at'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class, 'id');
    }

    public function dentist(){
        return $this->belongsTo(Dentist::class, 'id');
    }
}

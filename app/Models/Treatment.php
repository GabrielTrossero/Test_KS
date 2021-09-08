<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $table = "treatment";
    
    public $timestamps = false; //if is true, it does not allow me to modify the date format

    protected $fillable = [
        'external_id', 'dentist_id', 'patient_id', 'plates', 'created_at', 'updated_at', 'ended_at'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function dentist(){
        return $this->belongsTo(Dentist::class, 'dentist_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $table = "treatment";

    protected $fillable = [
        'external_id', 'dentist_id', 'patient_id', 'plates', 'created_at', 'updated_at', 'ended_at'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function dentist(){
        return $this->belongsTo(Dentist::class, 'dentist_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
        'ended_at' => 'datetime:Y-m-d'
    ];
}

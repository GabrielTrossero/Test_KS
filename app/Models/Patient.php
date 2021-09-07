<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = "patient";
    
    public $timestamps = false; //si está en true no me deja modificar el formato de la fecha

    protected $fillable = [
        'user_id', 'created_ad', 'updated_ad'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }

    public function treatment(){
        return $this->hasMany(Treatment::class, 'patient_id');
    }
}

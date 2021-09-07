<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentist extends Model
{
    use HasFactory;

    protected $table = "dentist";
    
    public $timestamps = false; //si está en true no me deja modificar el formato de la fecha

    protected $fillable = [
        'user_id', 'created_at', 'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }

    public function treatment(){
        return $this->hasMany(Treatment::class, 'dentist_id');
    }
}

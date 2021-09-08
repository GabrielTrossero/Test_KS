<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "user";
    
    public $timestamps = false; //if is true, it does not allow me to modify the date format

    protected $fillable = [
        'id', 'name', 'surname', 'gender', 'email', 'password', 'created_at', 'updated_at'
    ];

    public function patient(){
        return $this->hasOne(Patient::class, 'user_id');
    }

    public function dentist(){
        return $this->hasOne(Dentist::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livres extends Model
{
    use HasFactory;
    protected $fillable =[
        "titre",
        "annee_de_pub",
        "nombre_de_page",
        "auteur_id"
    ];
    public function emprunts(){
        return $this->hasMany(emprunts::class);
    }
    public function auteurs(){
        return $this->belongsTo(auteurs::class);
    }
}


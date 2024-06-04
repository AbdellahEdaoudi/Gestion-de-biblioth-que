<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model ;

class emprunts extends Model
{
    use HasFactory;
    protected $fillable = [
        "livre_id",
        "date_de_emprunte",
        "date_de_retour"
    ];
    public function livre(){
        return $this->belongsTo(livres::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // Définition du nom de la table
    protected $table = 'clients';



    // Définition des attributs
    protected $fillable = [
        'id',
        'designation',
        'ice',
        'if',
        'rc',
        'adresse',
        'tel',
        'email',
        'gerant',
    ];


    // Relations
     public function factures()
    {
        return $this->hasMany(Facture::class); 
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class); 
    }
}


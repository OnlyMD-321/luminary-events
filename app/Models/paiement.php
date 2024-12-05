<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contract;

class Paiement extends Model
{
    // Définition du nom de la table
    protected $table = 'paiements';



    // Définition des attributs
    protected $fillable = [
        'id',
        'date',
        'periode',
        'annee',
        'montant_total',
        'facture_id',
        

    ];

    // Relations

    public function facture()
{
    return $this->belongsTo(Facture::class);
}
 
}

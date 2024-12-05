<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    // Définition du nom de la table
    protected $table = 'factures';

    // Définition des attributs
    protected $fillable = [
        'numero_facture',
        'nom_client',
        'date_facture',
        'montant_total',
        'contract_id',
        'client_id',
    ];

    // Relations

    public function contract()
{
    return $this->belongsTo(Contract::class);
}
public function paiement()
{
    return $this->hasOne(Paiement::class);
}
public function client()
{
    return $this->belongsTo(Client::class); 
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    // Définition du nom de la table
protected $table = 'contracts';


// Définition des attributs
 protected $fillable = [
 'numero_contrat',
 'date_signature',
 'date_effet',
 'type_contrat',
 'mode_reglement',
 'signataire',
 'client_id',
];
//relations

public function facture()
{
    return $this->hasOne(Facture::class);
}
public function client()
{
    return $this->belongsTo(Client::class);
}
 public function services()
{
    return $this->belongsToMany(Service::class, 'service_contracts', 'contract_id', 'service_id');
}
}

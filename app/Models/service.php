<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Définition du nom de la table
protected $table = 'services';

// Définition des attributs
 protected $fillable = [
'type',
 'libelle',
'montant',
 'taux_tva',

];
// Relations

  public function contracts()
    {
        return $this->belongsToMany(Contract::class, 'service_contracts', 'service_id', 'contract_id');
    }
}

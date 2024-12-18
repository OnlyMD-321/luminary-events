<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['Nom', 'Prenom', 'Email', 'Telephone'];

    public function eventReservations()
    {
        return $this->hasMany(EventReservation::class, 'IDUser');
    }
}

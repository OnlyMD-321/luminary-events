<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = ['ModePaiement', 'IDEventReservation', 'IDUser', 'PrixTTC', 'Status'];

    public function eventReservation()
    {
        return $this->belongsTo(EventReservation::class, 'IDEventReservation');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'IDUser');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReservation extends Model
{
    use HasFactory;

    protected $fillable = ['IDClient', 'IDEvent', 'DateReservation', 'NombreSeats'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'IDClient');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'IDEvent');
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'IDEventReservation');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['IDEventReservation', 'IDClient', 'Rating', 'Comments'];

    public function eventReservation()
    {
        return $this->belongsTo(EventReservation::class, 'IDEventReservation');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'IDClient');
    }
}

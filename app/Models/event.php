<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['Nom', 'Description', 'IDTypeEvent', 'IDVenue'];

    public function typeEvent()
    {
        return $this->belongsTo(EventType::class, 'IDTypeEvent');
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'IDVenue');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'eventcategory', 'IDEvent', 'IDCategory');
    }
}

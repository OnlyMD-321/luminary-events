<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EventCategory extends Pivot
{
    protected $table = 'eventcategory';
}

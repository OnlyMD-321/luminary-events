<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ServiceContract extends Model
{
    use HasFactory;

    protected $table = 'service_contracts';

    protected $fillable = [
        'service_id',
        'contract_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}

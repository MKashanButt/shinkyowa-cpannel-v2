<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shipment extends Model
{
    protected $fillable = [
        'stock_id',
        'vessel_name',
        'eta',
        'etd',
    ];

    public function stock(): BelongsToMany
    {
        return $this->belongsToMany(Stock::class);
    }
}

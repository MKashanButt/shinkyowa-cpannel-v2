<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model
{
    protected $fillable = [
        'symbol',
        'code',
    ];

    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}

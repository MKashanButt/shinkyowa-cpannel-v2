<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $fillable = [
        'name',
    ];

    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function inquiry(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    public function customerAccount(): HasMany
    {
        return $this->hasMany(CustomerAccount::class);
    }
}

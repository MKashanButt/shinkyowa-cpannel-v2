<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    protected $fillable = [
        "name",
        "email",
        "phone",
        "country_id",
        "message",
        "ip"
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}

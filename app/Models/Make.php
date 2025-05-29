<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Make extends Model
{
    protected $fillable = [
        'image',
        'name',
    ];

    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}

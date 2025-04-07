<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Action extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'updates' => 'array',
            'created_at' => 'datetime',
        ];
    }

    const UPDATED_AT = null;

    public function transport(): BelongsTo
    {
        return $this->belongsTo(Transport::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}

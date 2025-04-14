<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transport(): BelongsTo
    {
        return $this->belongsTo(Transport::class);
    }

    public function actions(): HasMany
    {
        return $this->hasMany(Action::class);
    }

    //

    public function getName()
    {
        return $this->code;
    }

    public function getStatus()
    {
        return [
            'Beijing Warehouse',
            'Departed Beijing',
            'Arrived Ashgabat',
            'Ashgabat Warehouse',
            'Preparing',
            'Ready',
            'Delivered',
            'Lost',
        ][$this->status];
    }

    public function getPaymentStatus()
    {
        return [
            'Unpaid',
            'Paid',
        ][$this->payment_status];
    }

    public function getPaymentStatusColor()
    {
        return [
            'danger',
            'success',
        ][$this->payment_status];
    }
}

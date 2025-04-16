<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transport extends Model
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

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }

    public function actions(): HasMany
    {
        return $this->hasMany(Action::class);
    }

    //

    public function getName()
    {
        return $this->id . ' ' . $this->code;
    }

    public function getStatus()
    {
        return [
            'Beijing Warehouse',
            'Departed Beijing',
            'Arrived Ashgabat',
            'Ashgabat Warehouse',
        ][$this->status];
    }
}

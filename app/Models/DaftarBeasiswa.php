<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DaftarBeasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function beasiswa(): HasMany
    {
        return $this->hasMany(Beasiswa::class);
    }
}

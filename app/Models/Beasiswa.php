<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Beasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function daftarBeasiswa(): BelongsTo
    {
        return $this->belongsTo(DaftarBeasiswa::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'KodeNota', 'KodeTenan', 'KodeKasir', 'TglNota', 'JamNota', 'JumlahBelanja', 'Diskon', 'Total'
    ];

    public function tenan()
    {
        return $this->belongsTo(Kasir::class, 'KodeKasir', 'KodeKasir');
    }

    public function kasir()
    {
        return $this->hasMany(Barang::class, 'KodeNota', 'KodeNota');
    }

}
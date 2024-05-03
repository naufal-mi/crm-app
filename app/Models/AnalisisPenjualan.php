<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisisPenjualan extends Model
{
    use HasFactory;

    protected $table = 'analisis_penjualan';

    public function penjualan()
    {
        return $this->belongsToMany(Penjualan::class);
    }
}

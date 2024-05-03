<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function penjualan()
    {
        return $this->belongsTo(penjualan::class);
    }

    public function interaksi()
    {
        return $this->belongsTo(Interaksi::class);
    }
}

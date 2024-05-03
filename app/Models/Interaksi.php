<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaksi extends Model
{
    use HasFactory;

    protected $table = 'interaksi';

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function sales()
    {
        return $this->belongsTo(Sales::class);
    }
}

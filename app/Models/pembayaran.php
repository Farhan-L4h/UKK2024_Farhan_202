<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembayaran',
        
    ];

    public function penjualan()
    {
        return $this->hasMany(penjualan::class);
    }
}

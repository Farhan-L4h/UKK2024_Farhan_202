<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'id_kategori',
        'nama_obat',
        'harga',
        'keterangan',
        'stock',
        'exp',
    ];

    public function kategori(){
        return $this->belongsTo(kategori::class, 'id_kategori');
    }

    
    public function penjualan()
    {
        return $this->hasMany(penjualan::class);
    }
}

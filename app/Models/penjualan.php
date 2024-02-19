<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pelanggan',
        'id_pembayaran',
        'id_obat',
        'id_user',
        'tanggal',
        'jumlah',
        'total',
        'total_bayar',
        'kembali',
    ];

    public function pelanggan(){
        return $this->belongsTo(pelanggan::class, 'id_pelanggan');
    }
    public function pembayaran(){
        return $this->belongsTo(pembayaran::class, 'id_pembayaran');
    }
    public function obat(){
        return $this->belongsTo(obat::class, 'id_obat');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}

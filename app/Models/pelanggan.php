<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelangan',
        'username',
        'password',
        'alamat',
        'verti',
    ];

    public function penjualan()
    {
        return $this->hasMany(penjualan::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

}

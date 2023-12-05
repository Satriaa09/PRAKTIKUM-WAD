<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    use HasFactory;

    protected $table = 'showroom_mobils';

    protected $fillable = [
        'id', 'nama_mobil', 'brand_mobil', 'warna_mobil', 'tipe_mobil', 'harga_mobil', 'create_at', 'update_at'
    ];
}

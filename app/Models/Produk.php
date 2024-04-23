<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'price',
        'stock',
        'product_img',
    ];

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}

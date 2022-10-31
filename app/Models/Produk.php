<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kategori', 'cart'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class); // join ke table kategori, 1 blog 1 kategori
    }
    public function cart()
    {
        return $this->hasMany(Cart::class); // join ke table kategori, 1 blog 1 kategori
    }
}

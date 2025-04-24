<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Menambahkan kolom yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'category_id',
        'stok',
        'price',
        'sold_at',
    ];

    protected $casts = [
        'sold_at' => 'datetime',
    ];

     // Relasi ke kategori
     public function category()
     {
         return $this->belongsTo(Category::class);
     }
}

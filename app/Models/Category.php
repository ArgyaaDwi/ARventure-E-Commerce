<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image', // Sesuaikan dengan nama kolom di tabel database
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'id_kategori');
    }
}

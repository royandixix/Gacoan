<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'category_id', // ✅ FK
        'harga',
        'harga_promo',
        'promo_mulai',
        'promo_selesai',
        'gambar',
        'deskripsi',
        'is_active',
        'is_best_seller',
    ];

    protected $casts = [
        'promo_mulai' => 'date',
        'promo_selesai' => 'date',
    ];

    /* ================= RELATION ================= */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /* ================= HELPER ================= */

    public function getHargaFinalAttribute()
    {
        if (
            $this->harga_promo &&
            $this->promo_mulai &&
            $this->promo_selesai &&
            now()->between($this->promo_mulai, $this->promo_selesai)
        ) {
            return $this->harga_promo;
        }

        return $this->harga;
    }

    public function isPromoAktif()
    {
        return
            $this->harga_promo &&
            $this->promo_mulai &&
            $this->promo_selesai &&
            now()->between($this->promo_mulai, $this->promo_selesai);
    }
}

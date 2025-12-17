<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    /**
     * Field yang boleh diisi
     */
    protected $fillable = [
        'user_id',
        'kode_order',
        'status',
        'subtotal',
        'ongkir',
        'diskon',
        'total',
        'alamat_pengiriman',
    ];

    /**
     * Casting data
     */
    protected $casts = [
        'subtotal' => 'integer',
        'ongkir'   => 'integer',
        'diskon'   => 'integer',
        'total'    => 'integer',
    ];

    /* ================= RELATION ================= */

    /**
     * Order milik satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Order punya banyak item
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /* ================= HELPER ================= */

    /**
     * Label status (untuk blade)
     */
    public function statusLabel()
    {
        return match ($this->status) {
            'pending'   => 'Menunggu',
            'diproses'  => 'Sedang Diproses',
            'dikirim'   => 'Sedang Dikirim',
            'selesai'   => 'Selesai',
            'dibatalkan'=> 'Dibatalkan',
            default     => 'Unknown',
        };
    }

    /**
     * Warna badge status (Tailwind)
     */
    public function statusColor()
    {
        return match ($this->status) {
            'pending'   => 'bg-gray-100 text-gray-600',
            'diproses'  => 'bg-orange-100 text-orange-600',
            'dikirim'   => 'bg-blue-100 text-blue-600',
            'selesai'   => 'bg-green-100 text-green-600',
            'dibatalkan'=> 'bg-red-100 text-red-600',
            default     => 'bg-gray-100 text-gray-600',
        };
    }
}

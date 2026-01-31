<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kode_order',
        'status',
        'subtotal',
        'ongkir',
        'diskon',
        'total',
        'alamat_pengiriman'
    ];

    protected $casts = [
        'subtotal' => 'integer',
        'ongkir'   => 'integer',
        'diskon'   => 'integer',
        'total'    => 'integer'
    ];

    /* ================= RELATION ================= */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /* ================= ACCESSOR ================= */

    public function getCodeAttribute()
    {
        return $this->kode_order;
    }

    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'pending'    => 'Menunggu',
            'diproses'   => 'Sedang Diproses',
            'dikirim'    => 'Sedang Dikirim',
            'selesai'    => 'Selesai',
            'dibatalkan' => 'Dibatalkan',
            default      => ucfirst($this->status),
        };
    }

    public function getStatusTimeLabelAttribute()
    {
        return match ($this->status) {
            'pending'    => 'Waktu Pesan',
            'diproses'   => 'Diproses pada',
            'dikirim'    => 'Dikirim pada',
            'selesai'    => 'Selesai pada',
            'dibatalkan' => 'Dibatalkan pada',
            default      => '',
        };
    }

    public function getStatusTimeAttribute()
    {
        return $this->created_at->format('d M Y H:i');
    }

    /* ================= HELPER ================= */

    public function statusColor(): string
    {
        return match ($this->status) {
            'pending'    => 'warning',
            'diproses'   => 'info',
            'dikirim'    => 'primary',
            'selesai'    => 'success',
            'dibatalkan' => 'danger',
            default      => 'secondary',
        };
    }
}

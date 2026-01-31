<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'color_from',
        'color_to'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    /**
     * Untuk Tailwind gradient di Blade
     * ex: from-red-500 to-orange-400
     */
    public function getGradientClassAttribute(): string
    {
        if ($this->color_from && $this->color_to) {
            return "from-{$this->color_from} to-{$this->color_to}";
        }

        return 'from-gray-300 to-gray-400';
    }
}

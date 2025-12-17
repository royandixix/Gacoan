<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon', 'color_from', 'color_to'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}

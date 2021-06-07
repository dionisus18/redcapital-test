<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'assigned_routes');
    }
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
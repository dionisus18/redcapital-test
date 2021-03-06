<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role_id',
    ];
    public function routes()
    {
        return $this->belongsToMany(Route::class, 'assigned_routes');
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    use HasFactory;
}
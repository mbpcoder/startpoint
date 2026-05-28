<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'locale',
        'mobile',
        'password',
        'is_admin',
        'disabled',
        'description',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
        'disabled' => 'boolean',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return (bool) $this->is_admin;
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function newsletters()
    {
        return $this->hasMany(Newsletter::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

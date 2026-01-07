<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
         'referred_by',
    ];

    /**
 * Check if the user is an admin
 */
public function isAdmin(): bool
{
    return $this->role === 'admin';
}

/**
 * Check if the user is a regular user
 */
public function isUser(): bool
{
    return $this->role === 'user';
}

// Who invited me
public function referrer()
{
    return $this->belongsTo(User::class, 'referred_by');
}

// Who I invited
public function referrals()
{
    return $this->hasMany(User::class, 'referred_by');
}


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getFirstNameAttribute()
{
    return explode(' ', trim($this->name))[0];
}

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

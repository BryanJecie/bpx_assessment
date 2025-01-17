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
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    /**
     * The scopeActive function filters records with a status of 'active'.
     *
     * @param query The `` parameter in the `scopeActive` function is a query builder instance
     * that allows you to build and modify database queries in Laravel. In this specific function, it is
     * used to add a condition to filter records where the `status` column is set to 'active'.
     *
     * @return The `scopeActive` function is returning a query that filters records where the `status`
     * column is set to 'active'.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'f_name',
        'l_name',
        'email',
        'mobile',
        'status',
        'gender',
        'mobile_verify_code',
        'email_verified_at',
        'mobile_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @return HasMany
     */
    public function positions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserPosition::class);
    }

    /**
     * @return string|null
     */
    public function getFullNameAttribute(): ?string
    {
        $fullName =  $this->f_name . ' ' . $this->l_name;
        if (strlen($fullName) >= 1)
            return $fullName;
        return null;
    }

    /**
     * @return string
     */
    public function getGenderFaAttribute(): string
    {
        return match ($this->gender) {
            default => "نامشخص",
            'man' => "آقا",
            'woman' => "خانم",
        };
    }

    /**
     * @return string
     */
    public function getStatusFaAttribute(): string
    {
        return match ($this->status) {
            default => "نامشخص",
            'active' => "فعال",
            'inactive' => "غیر فعال",
        };
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPosition extends Model
{

    protected $fillable = [
        'user_id',
        'role',
        'from_datetime',
        'to_datetime',
        'status',
        'permissions'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'from_datetime' => 'datetime',
        'to_datetime' => 'datetime',
        'permissions' => 'array',
    ];

    /**
     * @return string
     */
    public function getRoleFaAttribute(): string
    {
        return match ($this->role) {
            default => "نامشخص",
            'super_admin' => 'ادمین',
            'manager' => 'مدیر',
            'teacher' => 'معلم/مربی',
            'parent' => 'سرپرست/ولی',
            'student' => 'دانش آموز',
        };
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

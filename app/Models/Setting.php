<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value'
    ];

    public $timestamps = false;
    /**
     * @param $query
     * @param $key
     * @return null
     */
    public function scopeKey($query, $key)
    {
        return $query->where('key', $key)->first()->value ?? null;
    }
}

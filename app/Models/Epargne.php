<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epargne extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'target_amount',
        'saved_amount',
        'month_year',
        'is_completed'
    ];

    protected $casts = [
        'month_year' => 'date',
        'is_completed' => 'boolean',
    ];

    public function getProgressPercentageAttribute()
    {
        if ($this->target_amount <= 0) return 0;
        return min(100, round(($this->saved_amount / $this->target_amount) * 100));
    }
}

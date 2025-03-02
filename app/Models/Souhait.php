<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souhait extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'montant_estime',
        'categorie',
        'user_id'
    ];

    protected $casts = [
        'montant_estime' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

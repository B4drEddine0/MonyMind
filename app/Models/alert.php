<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alert extends Model
{
    protected $fillable = ['porcentage', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Depences;    
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
        'salaire',
        'date_salaire',
        'budget',
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

    public function depences()
    {
        return $this->hasMany(Depences::class);
    }

    public function epargne()
    {
        return $this->hasOne(Epargne::class);
    }

    public function alert()
    {
        return $this->hasOne(Alert::class);
    }

    public function getRedirectRoute(){
        if($this->is_admin){
            return 'admin';
        }
        return 'dashboard';
    }

    public function getLastLogin(){
        $this->last_login_at = now();
        $this->save();
    }
}

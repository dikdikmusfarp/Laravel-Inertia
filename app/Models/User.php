<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    // protected $fillable = [
    //     'name',
    //     'avatar',
    //     'email',
    //     'password',
    // ];

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
    ];

    protected $appends = [
        'avatar_url',
    ];

    public function getUserInitialName() {
        $words = explode(' ', $this->name);
        $acronym = ' ';

        foreach ($words as $word){
            $acronym .= $word[0];
        }

        return $acronym;
    }

    public function getAvatarUrlAttribute() {
        if ($this->avatar) {
            return asset($this->avatar);
        }
        return 'https://via.placeholder.com/512x512/2D1959/FFFFFF&text='.$this->getUserInitialName();
    }
}

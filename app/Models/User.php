<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
// use Illuminate\Database\Eloquent\Model\Post;
// use Illuminate\Database\Eloquent\Model\PresidentAso;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'surname_user',
        'email',
        'password',
        'nickname_user',
        'roles_id',
        'image'
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
    ];

    // RELACIÓN DE UNO A UNO
    public function presidentAso()
    {
        return $this->hasOne(PresidentAso::class);
    }
    // RELACIÓN DE UNO A UNO
    public function presidentTeam()
    {
        return $this->hasOne(PresidentTeam::class);
    }
    // RELACIÓN DE UNO A UNOs
    public function players()
    {
        return $this->hasOne(Players::class);
    }
}

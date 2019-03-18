<?php

namespace App\Models;

use App\Enums\EUserRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $role_id
 */
class User extends Authenticatable implements MustVerifyEmail
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Register a new user.
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public static function register(string $name, string $email, string $password): self
    {
        return self::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role_id' => EUserRoles::USER,
        ]);
    }


    /**
     * Returns is the user administrator.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role_id === EUserRoles::ADMIN;
    }

}

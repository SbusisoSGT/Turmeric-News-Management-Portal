<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $fillable = [
        'name',
        'email',
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
        'password' => 'hashed',
    ];

     /**
     * Get the articles this user has posted
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    /**
     * Get the role of this user
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Check if User has any of the roles supplied in array
     *
     * @param  array  $roles
     * @return bool
     */
    public function hasAnyRoles(array $roles)
    {
        if($this->role()->whereIn('name', $roles)->first())
            return true;
          
        return false;
    }

    /**
     * Check if User has the roles supplied
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        if($this->role()->where('name', $role)->first())
            return true;

        return false;
    }
}

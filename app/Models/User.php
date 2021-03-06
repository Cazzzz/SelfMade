<?php
# @Date:   2020-11-16T16:31:06+00:00
# @Last modified time: 2021-03-11T12:44:06+00:00




namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        // 'personal_postal_address',
        // 'personal_bio',
        // 'education',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


public function roles()
{
  return $this->belongsToMany('App\Models\Role', 'user_role');
}

public function employer()
{
  return $this->hasOne('App\Models\Employer');
}

public function jobSeeker()
{
  return $this->hasOne('App\Models\JobSeeker');
}

public function authorizeRoles($roles)
{
  if (is_array($roles)) {
      return $this->hasAnyRole($roles);
}
      return $this->hasRole($roles);
}

public function hasAnyRole($roles)
{
  return null !== $this->roles()->whereIn('name', $roles)->first();
}

public function hasRole($role)
{
  return null !== $this->roles()->where('name', $role)->first();
}

}

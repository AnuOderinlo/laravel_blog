<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'profile_image',
        'email',
        'password',
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


   /**
    * Get all of the posts for the User
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function userHasRole($role_name)
    {
        foreach ($this->roles as $role) {
            if ($role_name === $role->name || $role->slug) {
                return true;
            }
        }

        return false;
    }


    public function setPasswordAttribute($data)
    {
        $this->attributes['password'] = bcrypt($data);
    }

    public function getProfileImageAttribute($value)
    {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) { //this is for images gotten online
            return $value;
        }
        return asset('storage/' . $value); //this is for images in the local path or directory
        // return  asset($value);
    }






}

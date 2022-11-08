<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'contact',
        'blog1',
        'blog2',
        'blog3',
        'insta1',
        'insta2',
        'insta3',
        'facebook1',
        'facebook2',
        'facebook3',
        'point',
        'password',
        'accepted',
        "master",
        "address"
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

    public function hasPermission($permission)
    {
        /*$roles = $this->roles()->cursor();

        foreach($roles as $role){
            if($role->permissions->contains("value", $permission))
                return true;
        }

        return false;*/
    }

}

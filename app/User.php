<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'phone', 'address', 'surname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($param)
    {   
        $this->attributes['password'] = bcrypt($param);
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname}";
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function scopeClients($query)
    {
        return $query->whereHas('role', function($query) {
            $query->whereRole('Client');
        });
    }
    public function scopeWorkers($query)
    {
        return $query->whereHas('role', function($query) {
            $query->whereRole('Worker');
        });
    }


}

<?php

namespace App\Models;

use App\Models\Traits\Acl;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Acl;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static function boot()
    {
        parent::boot();
        
        Static::creating(function($model) {
           $model->password = bcrypt($model->password);
        });
    }

//    public function setPasswordAttribute($value)
//    {
//        $this->attributes['password'] = bcrypt($value);
//    }

    /*
    |--------------------------------------------------------------------------
    | Relationship Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Many-To-Many Relationship Method for accessing the User->roles
     *
     * @return QueryBuilder Object
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * has many relation
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Checks if the user is super_admin(is_alpha)
     * @return Boolean
     */
    public function isSuperMan()
    {
        return $this->is_alpha;
    }

    /**
     * scope for not super man
     * 
     * @param $query
     * @return mixed
     */
    public function scopeByIsNotSuperMan($query)
    {
        return $query->where('is_alpha', 0);
    }
}

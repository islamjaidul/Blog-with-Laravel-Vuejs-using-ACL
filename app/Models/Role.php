<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    /**
     * saving title as slug
     */
    public static function boot()
    {
        parent::boot(); 
        
        static::saving(function($model) {
           $model->name = str_slug($model->title); 
        });
    }
    /*
   |--------------------------------------------------------------------------
   | Relationship Methods
   |--------------------------------------------------------------------------
   */

    /**
     * many-to-many relationship method.
     *
     * @return QueryBuilder
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * many-to-many relationship method.
     *
     * @return QueryBuilder
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
}

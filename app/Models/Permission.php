<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    public $table = 'permissions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'resource',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Scope a query to only include permissions of a given resource.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $resource
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeResource($query, $resource)
    {
        return $query->where('resource', $resource);
    }
    public static function getResources()
    {
        return self::groupBy('resource')->pluck('resource')->toArray();
    }


    /** 
     *  Relations
    */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

     
}

<?php

namespace App\Models;


use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'price',
    ];

    /** 
     *  Relations
    */
    public function courses() {
        return $this->hasMany(Course::class, 'package_id', 'id');
    }
    public function school() {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}

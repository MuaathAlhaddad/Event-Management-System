<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'item',
    ];

    /** 
     *  Relations
    */
    public function school () {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}

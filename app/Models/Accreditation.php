<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accreditation extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'country',
        'document',
    ];

    /** 
     *  Relations
    */
    public function schools() {
        return $this->belongsToMany(School::class, 'accreditation_school', 'accreditation_id', 'school_id');
    }
}

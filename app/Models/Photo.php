<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'src',
        'format',
        'size',
        'thumbnail',
    ];

    /** 
     *  Relations
    */
    public function school() {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
    
}

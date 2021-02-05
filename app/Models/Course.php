<?php

namespace App\Models;


use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $fillable= [
        'name',
        'price',
        'duration',
        'start_date',
        'description',
    ];
    protected $table = "courses";

    /**
     *  Relations
    */
    public function package() {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
}

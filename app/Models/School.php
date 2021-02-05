<?php

namespace App\Models;

use App\Models\User;
use App\Models\Photo;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'location',
        'registration_fee',
        'curriculum',
        'telephone',
        'fax',
        'student_nationalities',
        'no_student_class',
        'published',
        'website',
        'social_media',
        'application_link',
    ];

    protected $cast = [
        'student_nationalities' => 'array',
        'no_student_class'      => 'array',
        'social_media'          => 'array',
    ];

    /**
     * Relations
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function services() {
        return $this->hasMany(Service::class, 'school_id', 'id');
    }
    public function packages() {
        return $this->hasMany(Package::class, 'school_id', 'id');
    }
    public function photos() {
        return $this->hasMany(Photo::class, 'school_id', 'id');
    }
    public function materials() {
        return $this->hasMany(Material::class, 'school_id', 'id');
    }
    public function reviews() {
        return $this->hasMany(Review::class, 'school_id', 'id');
    }
    public function accreditations() {
        return $this->belongsToMany(Accreditation::class, 'accreditation_school', 'school_id','accreditation_id');
    }
    public function calendar() {
        return $this->hasOne(Calendar::class, 'school_id', 'id');
    }
}

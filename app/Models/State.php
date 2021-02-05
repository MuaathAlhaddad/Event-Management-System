<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    public $timestamps = false;

    /**
     * Relations
     */
    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}

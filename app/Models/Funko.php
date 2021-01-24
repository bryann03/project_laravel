<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funko extends Model
{
    protected $table = 'funko';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public $timestamps = false;

    public function funkos_collection()
    {
        return $this->belongsTo('App\Models\FunkoColletion', 'id');
    }
}

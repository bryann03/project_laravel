<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FunkoCollection extends Model
{
    protected $table = 'collection';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public $timestamps = false;

    public function funkos()
    {
        return $this->hasMany('App\Models\Funko', 'id_collection');
    }
}

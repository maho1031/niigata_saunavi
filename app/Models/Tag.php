<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function saunas()
    {
        return $this->belongsToMany('App\Models\Sauna');
    }
}

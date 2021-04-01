<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaunaReview extends Model
{
    protected $fillable = ['sauna_id', 'user_id', 'stars', 'comment'];

    public function review_user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
        // return $this->belongsTo('App\User', 'user_id', 'id')->select('id', 'name');
    }

    public function review_sauna()
    {
        return $this->belongsTo('App\Models\Sauna', 'sauna_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function drill()
    {
        return $this->belongsTo('App\Drill');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drill extends Model
{
    protected $fillable = ['user_id', 'title', 'category_id', 'difficulty'];
}

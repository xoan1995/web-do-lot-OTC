<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoncherProduct extends Model
{
    protected $table = 'product_voncher';
    protected $fillable =['event_value','event_voncher'];
}

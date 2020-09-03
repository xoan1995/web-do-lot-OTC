<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Themes extends Model
{
    protected $table = 'themes';
    protected $fillable = ['title','logo','favicon','hotline','subfooter','slogan'];
}

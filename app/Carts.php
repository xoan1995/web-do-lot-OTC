<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = 'carts';
    protected $fillable = ['checkout_id','product_name','quantity','price','color'];
}

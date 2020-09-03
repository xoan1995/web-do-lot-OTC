<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    protected $fillable = ['color'];

    public function product()
    {
        return $this->belongsToMany(Product::class,'product_color','color_id','product_id');
    }
}

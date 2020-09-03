<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';
    protected $fillable = ['size','size2','sizefix'];

    public function product()
    {
        return $this->belongsToMany(Product::class,'product_size','size_id','product_id');
    }
}

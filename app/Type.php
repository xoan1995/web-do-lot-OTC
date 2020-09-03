<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $fillable =['img','name','slug'];

    public function product()
    {
        return $this->belongsToMany(Product::class,'product_type','type_id','product_id');
    }
}

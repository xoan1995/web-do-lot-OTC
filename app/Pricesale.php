<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricesale extends Model
{
    protected $table = 'pricesale';
    protected $fillable = ['pricesale'];

    public function user()
    {
        return $this->belongsToMany(User::class,'user_pricesale','pricesale_id','user_id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class,'pricesale_product','pricesale_id','product_id');
    }
}

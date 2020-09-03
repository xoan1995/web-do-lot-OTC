<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = [];
    protected $table = 'galleries';
    protected $fillable =['img'];
    public function Product()
    {
        return $this->belongsToMany(ProductCategory::class,'product_gallery','gallery_id','product_id');
    }
}

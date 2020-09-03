<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','nametext','nametext2','option','productnew','producthot','price1','price2','color','avatar','logo','info1','info2','info3','info4','slug'];
    public function Category()
    {
        return $this->belongsToMany(Category::class,'product_category','product_id','category_id')->withTimestamps();
    }
    public function Gallery()
    {
        return $this->belongsToMany(Gallery::class,'product_gallery','product_id','gallery_id')->withTimestamps();
    }
    public function Color()
    {
        return $this->belongsToMany(Color::class,'product_color','product_id','color_id');
    }

    public function Size()
    {
        return $this->belongsToMany(Size::class,'product_size','product_id','size_id');
    }

    public function Type()
    {
        return $this->belongsToMany(Type::class,'product_type','product_id','type_id');
    }
    public function PriceSale()
    {
        return $this->belongsToMany(Pricesale::class,'pricesale_product','product_id','pricesale_id');
    }
}

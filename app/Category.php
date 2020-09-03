<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['type','category_id','image','category','text','slug','showmenu','showindex','checkmenutop','submenu','submenu2'];
    public function Product()
    {
        return $this->belongsToMany(Product::class,'product_category','category_id','product_id');
    }
    public function parentCategory()
    {
        return $this->belongsToMany(ParentCategory::class,'category_parentcategory','category_id','parent_category_id');
    }
    public function About()
    {
        return $this->belongsToMany(About::class,'about_category','about_id','category_id');
    }
    //recursive  Categories
    public function categories()
    {
        return $this->hasMany(Category::class,'category_id');
    }
    public function childCategories()
    {
        return $this->hasMany(Category::class,'category_id')->with('categories');
    }
}

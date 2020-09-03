<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';
    protected $fillable = ['showindex','name','slug','text','image','editor','role'];

    public function Category()
    {
        return $this->belongsToMany(Category::class,'about_category','category_id','about_id');
    }
}

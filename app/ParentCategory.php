<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    protected $table = 'parent_categories';
    protected $fillable = ['label','link','text','showindex'];
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsToMany(Category::class,'category_parentcategory','parent_category_id','category_id');
    }
}

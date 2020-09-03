<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = ['user_id','username','useremail','usercall','address','text','product_id','quantity','price','color'];
}

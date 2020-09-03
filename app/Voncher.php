<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voncher extends Model
{
    protected $table = 'vonchers';
    protected $fillable = ['value','voncher'];

    public function price()
    {
        return $this->value;
    }
    public function priceSale($price)
    {
        return ($price * $this->price())/100;
    }
}

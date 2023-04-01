<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['id', 'name', 'isNew', 'isOnSale', 'link', 'description'];

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function details()
    {
        return $this->hasOne(Details::class);
    }
}

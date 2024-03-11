<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Store extends Model
{
    protected $fillable = ['id', 'platform'];

    protected $table = 'stores';

    // Each store has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
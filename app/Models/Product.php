<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'currency', 'inventory_level', 'sizes', 'colors', 'weight', 'store_id'];

    // Each product belongs to a store
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
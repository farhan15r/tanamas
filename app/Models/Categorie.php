<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Categorie extends Model
{
    use HasFactory;

    // public function car()
    // {
    //     return $this->hasMany(Product::class);
    //     return $this->hasMany
    // }
    /**
     * Get all of the car for the Categorie
     *
     * @return \Illuminate\Product\Eloquent\Relations\HasMany
     */
    public function car(): HasMany
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}

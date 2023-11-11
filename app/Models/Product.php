<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\Transaction;

class Product extends Model
{
    use HasFactory;

    // public function vendor()
    // {
    // 	return $this->belongsTo(Categorie::class);
    // }

    // /**
    //  * Get the vendor that owns the Product
    //  *
    //  * @return \Illuminate\Categorie\Eloquent\Relations\BelongsTo
    //  */
    // public function vendor()
    // {
    //     return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    // }

    /**
     * Get the vendor that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendor()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }
    
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}

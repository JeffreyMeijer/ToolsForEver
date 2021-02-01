<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locatie extends Model
{
    use HasFactory;
    protected $table = 'locatie';

    /**
     * Gets all the products that are linked to a Location.
     *
     * @return void
    */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'artikel_locatie');
    }

    /**
     * Adds a product to a specified location.
     *
     * @return void
    */
    public function addProduct($id)
    {
        $this->products()->syncWithoutDetaching($id);
    }

    protected $fillable = [
        'naam', 'adres', 'postcode'
    ];
}

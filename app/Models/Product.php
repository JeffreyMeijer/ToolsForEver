<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'artikelen';
    public $timestamps = false;

    /**
     * Grabs all the locations linked to a product..
     *
     * @return void
    */
    public function locations()
    {
        return $this->belongsToMany(Locatie::class, 'artikel_locatie');
    }

    /**
     * Adds a location to a specific product.
     *
     * @return void
    */
    public function addLocation($id)
    {
        $this->locations()->syncWithoutDetaching($id);
    }

    /**
     * Searches for a product based on their ID or Name.
     *
     * @return void
    */
    public static function search($search)
    {
        return empty($search) ? static::query() : static::query()->where('id', 'like', '%'.$search.'%')->orWhere('artikel', 'like', '%'.$search.'%');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'artikel', 'voorraad', 'beschrijving', 'afbeelding'
    ];
}

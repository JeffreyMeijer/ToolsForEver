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
     * @param int $id location id to add
     * @return void
    */
    public function addLocation($id)
    {
        $this->locations()->syncWithoutDetaching($id);
    }

    /**
     * Sets the location of a specific product by first detaching all locations and then attaching just one location.
     * 
     * @param int $id location id to set
     * @return void
     */
    public function setLocation($id)
    {
        $this->locations()->detach();

        $this->addLocation($id);
    }

    /**
     * Searches for a product based on their ID or Name.
     *
     * @param string $search the string to search for
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

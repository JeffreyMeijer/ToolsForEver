<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'medewerker';


    /**
     * Grabs all the locations that are linked to an Employee.
     *
     * @return void
    */
    public function locations()
    {   
        return $this->belongsToMany(Locatie::class, 'medewerker_locatie');
    }

    /**
     * Adds a location to the Employee.
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
     * Searches for an Employee based on their Name or Position in the company.
     *
     * @param string $search the string to search for
     * @return void
    */

    public static function search($search)
    {
        return empty($search) ? static::query() : static::query()->where('id', 'like', '%'.$search.'%')->orWhere('naam', 'like', '%'.$search.'%')->orWhere('positie', 'like', '%'.$search.'%');
    }

    protected $fillable = [
        'naam', 'positie', 'beschrijving', 'afbeelding'
    ];
}

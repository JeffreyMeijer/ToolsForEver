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
     * @return void
    */

    public function addLocation($id)
    {
        $this->locations()->syncWithoutDetaching($id);
    }

    /**
     * Searches for an Employee based on their Name or Position in the company.
     *
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

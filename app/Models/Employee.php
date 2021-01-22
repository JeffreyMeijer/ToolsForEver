<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'medewerker';

    public function locations()
    {   
        return $this->belongsToMany(Locatie::class, 'medewerker_locatie');
    }

    public function addLocation($id)
    {
        $this->locations()->syncWithoutDetaching($id);
    }

        protected $fillable = [
        'naam', 'positie', 'beschrijving', 'afbeelding'
    ];
}

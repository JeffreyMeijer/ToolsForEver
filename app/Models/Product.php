<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'artikelen';
    public $timestamps = false;

    public function locations()
    {
        return $this->belongsToMany(Locatie::class, 'artikel_locatie');
    }

    public function addLocation($id)
    {
        $this->locations()->syncWithoutDetaching($id);
    }

    protected $fillable = [
        'artikel', 'voorraad', 'beschrijving', 'afbeelding'
    ];
}

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

    public static function search($search)
    {
        return empty($search) ? static::query() : static::query()->where('id', 'like', '%'.$search.'%')->orWhere('artikel', 'like', '%'.$search.'%');
    }

    protected $fillable = [
        'artikel', 'voorraad', 'beschrijving', 'afbeelding'
    ];
}

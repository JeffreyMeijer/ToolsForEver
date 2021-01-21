<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locatie extends Model
{
    use HasFactory;
    protected $table = 'locatie';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'artikel_locatie');
    }

    public function addProduct($id)
    {
        $this->products()->syncWithoutDetaching($id);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductLocation extends Pivot
{
    protected $table = 'artikel_locatie';
}

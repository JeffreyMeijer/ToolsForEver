<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeLocation extends Pivot
{
    protected $table = 'medewerker_locatie';
}

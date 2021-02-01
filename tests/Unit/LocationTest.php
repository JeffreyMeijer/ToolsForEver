<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Locatie;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test to see if locations get created
     *
     * @return void
    */

    public function test_createLocations()
    {
        $locations = Locatie::factory()->count(5)->create();

        $this->assertEquals(count($locations), 5);
    }

    /**
     * A basic test to see if a location get updated correctly
     *
     * @return void
    */
    public function test_editLocation()
    {
        $locations = Locatie::factory()->count(5)->create();

        $this->assertEquals(count($locations), 5);

        $location = $locations->first();

        $location->update([
            'naam' => 'Assen',
            'adres' => 'Beethovenplaats 6',
        ]);

        $this->assertEquals($location->naam, 'Assen');
        $this->assertEquals($location->adres, 'Beethovenplaats 6');
    }

    /**
     * A basic test to see if a location gets deleted
     *
     * @return void
    */

    public function test_deleteLocation()
    {
        $locations = Locatie::factory()->count(5)->create();

        $this->assertEquals(count($locations), 5);

        $location = $locations->first();

        $location->delete();

        $this->assertDeleted($location);
    }
}

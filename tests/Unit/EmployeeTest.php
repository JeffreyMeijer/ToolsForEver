<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test to see if employees get created
     *
     * @return void
    */

    public function test_createEmployees()
    {
        $employees = Employee::factory()->count(5)->create();

        $this->assertEquals(count($employees), 5);
    }

    /**
     * A basic test to see if an employee get updated correctly
     *
     * @return void
    */
    public function test_editEmployee()
    {
        $employees = Employee::factory()->count(5)->create();

        $this->assertEquals(count($employees), 5);

        $employee = $employees->first();

        $employee->update([
            'naam' => 'Jeffrey',
            'positie' => 'Webdeveloper',
        ]);

        $this->assertEquals($employee->naam, 'Jeffrey');
        $this->assertEquals($employee->positie, 'Webdeveloper');
    }

    /**
     * A basic test to see if an employee gets deleted
     *
     * @return void
    */

    public function test_deleteEmployee()
    {
        $employees = Employee::factory()->count(5)->create();

        $this->assertEquals(count($employees), 5);

        $employee = $employees->first();

        $employee->delete();

        $this->assertDeleted($employee);
    }
}

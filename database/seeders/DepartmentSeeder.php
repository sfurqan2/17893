<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Department::insert([
            'department_name' => 'Accounts Department'
        ]);

        Department::insert([
            'department_name' => 'Purchase Department'
        ]);

        Department::insert([
            'department_name' => 'Inventory Department'
        ]);
    }
}

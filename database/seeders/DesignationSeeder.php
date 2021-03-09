<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Designation::insert([
            'designation_name' => 'Department Head',
        ]);

        Designation::insert([
            'designation_name' => 'Buyer',
        ]);
    }
}

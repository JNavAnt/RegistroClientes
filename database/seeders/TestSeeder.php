<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Report;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Customer::create([
            'fullName' => 'test customer', 
            'business' => 'Test business',
            'email' => 'test@test.com',
            'phone' => '6243525626',
        ]);

        Report::create([
            'customer_id' => 1, 
            'equipmentBrand' => 'Test Brand',
            'equipmentModel' => 'Test Model',
            'equipmentSN' => 'Test SN',
            'entranceDate' => '2021-05-04 11:53:00',
        ]);
    }
}

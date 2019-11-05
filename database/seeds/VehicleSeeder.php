<?php

use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'name' => 'Vehicle 1'
        ];

        DB::table("vehicles")->insert($items);
    }
}

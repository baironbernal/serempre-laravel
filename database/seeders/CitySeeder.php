<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['Bogota', 'Medellin', 'Cali'];

        foreach ($cities as $item) {
            City::create([
                'name' => $item,
            ]);
        }

        return true;
    }
}

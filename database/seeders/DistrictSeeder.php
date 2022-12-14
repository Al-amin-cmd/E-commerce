<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = ['Dhaka', 'Rajshahi', 'Khulna', 'Barisal', 'Rongpur'];

        foreach ($districts as $district)
            District::create(['name' => $district]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['Green', 'Red', 'Yellow','Oriange'];
        foreach ($colors as $color) {
            Color::create(['name' => $color]);
        }
    }
}
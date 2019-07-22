<?php

use Illuminate\Database\Seeder;

use App\MeasuringUnit;

class MeasuringUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MeasuringUnit::create([
            'id' => 1,
            'name' => 'DEFAULT',
            'is_visible' => false
        ]);
        
        MeasuringUnit::create([
            'id' => 2,
            'is_visible' => true,
            'name' => 'Pieces (s)'
        ]);
        
        MeasuringUnit::create([
            'id' => 3,
            'is_visible' => true,
            'name' => 'Packet (s)'
        ]);
        
        MeasuringUnit::create([
            'id' => 4,
            'is_visible' => true,
            'name' => 'ml (liquid)'
        ]);
        
        MeasuringUnit::create([
            'id' => 5,
            'is_visible' => true,
            'name' => 'm (meters)'
        ]);
    }
}

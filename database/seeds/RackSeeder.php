<?php

use Illuminate\Database\Seeder;

use App\Rack;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Rack::create([
            'id' => 1,
            'name' => 'DEFAULT',
            'is_visible' => false
        ]);
        
        Rack::create([
            'id' => 2,
            'is_visible' => true,
            'name' => 'R1'
        ]);
        
        Rack::create([
            'id' => 3,
            'is_visible' => true,
            'name' => 'R2'
        ]);
        
        Rack::create([
            'id' => 4,
            'is_visible' => true,
            'name' => 'R3'
        ]);
        
        Rack::create([
            'id' => 5,
            'is_visible' => true,
            'name' => 'R4'
        ]);
        
        Rack::create([
            'id' => 6,
            'is_visible' => true,
            'name' => 'R5'
        ]);
    }
}

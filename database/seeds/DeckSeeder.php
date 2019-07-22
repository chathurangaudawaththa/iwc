<?php

use Illuminate\Database\Seeder;

use App\Deck;

class DeckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Deck::create([
            'id' => 1,
            'name' => 'DEFAULT',
            'is_visible' => false
        ]);
        
        Deck::create([
            'id' => 2,
            'is_visible' => true,
            'name' => 'D1'
        ]);
        
        Deck::create([
            'id' => 3,
            'is_visible' => true,
            'name' => 'D2'
        ]);
        
        Deck::create([
            'id' => 4,
            'is_visible' => true,
            'name' => 'D3'
        ]);
        
        Deck::create([
            'id' => 5,
            'is_visible' => true,
            'name' => 'D4'
        ]);
        
        Deck::create([
            'id' => 6,
            'is_visible' => true,
            'name' => 'D5'
        ]);
    }
}

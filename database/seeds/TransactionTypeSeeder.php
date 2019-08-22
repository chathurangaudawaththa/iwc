<?php

use Illuminate\Database\Seeder;

use App\TransactionType;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TransactionType::create([
            'id' => 1,
            'name' => 'DEFAULT',
            'is_visible' => false
        ]);
        
        TransactionType::create([
            'id' => 2,
            'name' => 'PLUS',
            'is_visible' => true
        ]);
        
        TransactionType::create([
            'id' => 3,
            'name' => 'MINUS',
            'is_visible' => true
        ]);
        
        TransactionType::create([
            'id' => 4,
            'name' => 'RENT-EMPLOYEE',
            'is_visible' => true
        ]);
        
        TransactionType::create([
            'id' => 5,
            'name' => 'RENT-CUSTOMER',
            'is_visible' => true
        ]);
        
        TransactionType::create([
            'id' => 6,
            'name' => 'RETURN-EMPLOYEE',
            'is_visible' => true
        ]);
        
        TransactionType::create([
            'id' => 7,
            'name' => 'RETURN-CUSTOMER',
            'is_visible' => true
        ]);
    }
}

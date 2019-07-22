<?php

use Illuminate\Database\Seeder;

use App\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserType::create([
            'id' => 1,
            'name' => 'DEFAULT',
            'is_visible' => false
        ]);
        
        UserType::create([
            'id' => 2,
            'name' => 'EMPLOYEE',
            'is_visible' => true
        ]);
        
        UserType::create([
            'id' => 3,
            'name' => 'CUSTOMER',
            'is_visible' => true
        ]);
    }
}

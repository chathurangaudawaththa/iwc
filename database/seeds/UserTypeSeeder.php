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
            'name' => 'EMPLOYEE',
            'is_visible' => 1
        ]);
        
        UserType::create([
            'id' => 2,
            'name' => 'CUSTOMER',
            'is_visible' => 1
        ]);
    }
}

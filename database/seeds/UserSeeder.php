<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'id' => 1,
            'is_visible' => false,
            'first_name' => 'first name',
            'last_name' => 'last name',
            'address' => 'address',
            'phone' => '0000000000',
            'nic' => '000000000v',
            'code' => 1,
            'username' => 'admin',
            'password' => Hash::make('password')
        ]);
    }
}

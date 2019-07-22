<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(UserTypeSeeder::class);
        $this->call(MeasuringUnitSeeder::class);
        $this->call(RackSeeder::class);
        $this->call(DeckSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TransactionTypeSeeder::class);
    }
}

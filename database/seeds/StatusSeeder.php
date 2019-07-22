<?php

use Illuminate\Database\Seeder;

use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Status::create([
            'id' => 1,
            'slug' => 'default',
            'name' => 'DEFAULT',
            'is_visible' => false
        ]);
    }
}

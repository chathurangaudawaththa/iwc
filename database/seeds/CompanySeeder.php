<?php

use Illuminate\Database\Seeder;

use App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Company::create([
            'id' => 1,
            'name' => 'DEFAULT',
            'is_visible' => false
        ]);
        
        Company::create([
            'id' => 2,
            'name' => 'IWC',
            'is_visible' => true
        ]);
    }
}

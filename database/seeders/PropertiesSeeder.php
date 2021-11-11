<?php

namespace Database\Seeders;

use App\Models\Properties;
use Illuminate\Database\Seeder;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds
     * To test pagination
     *
     * @return void
     */
    public function run()
    {
        Properties::factory(100)->create();
    }
}

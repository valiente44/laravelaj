<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\zone;
use Faker\Factory;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('es_ES');
        
        for ($i=0; $i < 5; $i++){
            zone::create([
               'zone_name' => $faker->word, 
               'adress' => $faker->word, 
               'surface' => $faker->word, 
            ]);
        }
    }
}

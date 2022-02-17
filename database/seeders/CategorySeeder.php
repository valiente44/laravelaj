<?php

namespace Database\Seeders;

use App\Models\category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
            category::create([
               'title' => $faker->word, 
            ]);
        }
    }
}

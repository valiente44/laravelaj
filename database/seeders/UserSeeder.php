<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('es_ES');
        
        DB::table('users')->insert([
            'name' => 'admin',
            'sur_name' => 'aaa',
            'dni' =>'399998846T',
            'email' => 'admin@admin.com',
            'zip_code' => '45555',
            'phone' => '7777777',
            'user_types' => '1',
            'password' => Hash::make('password'),
        ]);
        
        for($i = 0; $i < 15; $i++){
            User::create([
               'name' => $faker->name,
               'sur_name' => 'apellido',
               'dni' => $faker->dni,
               'zip_code' => $faker->name,
               'phone' => '7777777',
               'email' => $faker->unique()->safeEmail,
               'user_types' => '3',
               'password' => Hash::make('password'),
            ]);
        }
    }
    
}

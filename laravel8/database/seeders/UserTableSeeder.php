<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
        // User::create([
        //     'name' => 'Paulo Aslan',
        //     'email' => 'paslan@gmail.com',
        //     'password' => bcrypt(12345),
        // ]);
    }
}

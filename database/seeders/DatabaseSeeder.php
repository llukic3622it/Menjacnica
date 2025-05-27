<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * 
     */
    public function run()
    {

        User::factory()->create([
            'name' => 'Test user',
            'email' => 'test@example.com'
        ]);


        $this ->call([
            ProductSeeder::class

        ]);
    }
}

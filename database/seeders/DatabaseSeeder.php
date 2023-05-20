<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* User::factory(50)->create(); */

        User::create([
            'name' => 'Martin Aquino',
            'email' => 'maquino@codigobyte.com.ar',
            'password' => bcrypt('Maquino*2030')
        ]);

        Article::factory(150)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(PostTableSeeder::class);
        \App\Models\Category::factory(5)->create();
        \App\Models\Comment::factory(40)->create();
    }
}

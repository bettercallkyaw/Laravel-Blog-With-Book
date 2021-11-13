<?php

namespace Database\Seeders;

use App\Models\User;
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

        $user=new User();
        $user->name='bob smith';
        $user->email='bob@gmail.com';
        $user->password=bcrypt('12345678');
        $user->save();

        $user=new User();
        $user->name='william kate';
        $user->email='william@gmail.com';
        $user->password=bcrypt('12345678');
        $user->save();
    }
}

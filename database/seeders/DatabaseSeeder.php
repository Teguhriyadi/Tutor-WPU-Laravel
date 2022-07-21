<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
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
        $this->call(UserTableSeeder::class);
        // $t
        // User::create([
        //     "name" => "Mohammad Ilham",
        //     "username" => "mohammadilham",
        //     "email" => "mohammad@gmail.com",
        //     "password" => bcrypt("password")
        // ]);

        // User::factory(3)->create();

        // Category::create([
        //     "name" => "Web Programming",
        //     "slug" => "web-programming"
        // ]);

        // Category::create([
        //     "name" => "Personal",
        //     "slug" => "personal"
        // ]);

        // Category::create([
        //     "name" => "Web Design",
        //     "slug" => "web-design"
        // ]);

        // Post::factory(20)->create();
    }
}

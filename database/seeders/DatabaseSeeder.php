<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name'=> 'Personal',
            'slug'=>'personal'
        ]);

        $family = Category::create([
            'name'=> 'Family',
            'slug'=>'family'
        ]);

        $work =Category::create([
            'name'=> 'Work',
            'slug'=>'work'
        ]);

       
    }
}

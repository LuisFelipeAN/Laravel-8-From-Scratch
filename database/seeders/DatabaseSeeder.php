<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Faker\Provider\Lorem;

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
        Category::truncate();
        Post::truncate();
        $user = User::factory()->create();

        $personal= Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
        ]);

        $familly= Category::create([
            'name'=>'Familly',
            'slug'=>'familly'
        ]);

        $work= Category::create([
            'name'=>'Work',
            'slug'=>'work'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$familly->id,
            'title'=>'My Familly Post',
            'slug'=>'my-familly-post',
            'exerpt'=>'  Lorem ipsum, dolor sit',
            'body'=>'  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus laudantium natus omnis in at inventore nostrum pariatur beatae! Maiores et dolorem nulla tenetur vel ducimus temporibus quod consequatur accusamus error.            '
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$work->id,
            'title'=>'My Work Post',
            'slug'=>'my-work-post',
            'exerpt'=>'  Lorem ipsum, dolor sit',
            'body'=>'  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus laudantium natus omnis in at inventore nostrum pariatur beatae! Maiores et dolorem nulla tenetur vel ducimus temporibus quod consequatur accusamus error.            '
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$personal->id,
            'title'=>'My Personal Post',
            'slug'=>'my-personal-post',
            'exerpt'=>'  Lorem ipsum, dolor sit',
            'body'=>'  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus laudantium natus omnis in at inventore nostrum pariatur beatae! Maiores et dolorem nulla tenetur vel ducimus temporibus quod consequatur accusamus error.            '
        ]);
    }
}

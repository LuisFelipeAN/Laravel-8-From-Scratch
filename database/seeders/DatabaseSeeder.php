<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Faker\Provider\Lorem;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name'=>'Luis Felipe'
        ]);
        
        Post::factory(10)->create();
        
        $post= Post::factory()->create([
            'user_id'=>$user->id
        ]);

        Comment::factory(5)->create([
            'user_id'=>$user->id,
            'post_id'=> $post->id
        ]);

        Comment::factory(5)->create([
            'post_id'=> $post->id
        ]);
    }
}

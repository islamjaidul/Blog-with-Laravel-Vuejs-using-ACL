<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'This is the first post',
                'body' => 'This is the post body',
                'user_id' => 2
            ],
            [
                'title' => 'This is the second post',
                'body' => 'This is the second post body',
                'user_id' => 2
            ],
        ];
        
        foreach ($posts as $post) {
            Post::forceCreate($post);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('posts');
        $posts = Post::factory(3)
            // ->has(Comment::factory(3), 'comments')
            ->titled()
            ->create();

        $posts->each(function (Post $post){
            $post->users()->sync([FactoryHelper::getRandomModelID(User::class)]);
        });
        $this->enableForeignKeys();
    }
}

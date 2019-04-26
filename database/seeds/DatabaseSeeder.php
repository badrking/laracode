<?php

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
      // $this->call(UsersTableSeeder::class);
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('roles')->truncate();
        DB::table('categories')->truncate();
        DB::table('photos')->truncate();
        DB::table('comments')->truncate();
        DB::table('comment_replies')->truncate();

        factory(App\Role::class,4)->create();
        factory(App\Photo::class,10)->create();
        factory(App\Category::class,10)->create();
        factory(App\User::class,10)->create()->each(function($user){
            $user->posts()->save(factory(App\Post::class)->make());
        });
        // factory(App\Post::class,10)->create()->each(function($post){
        //     $user->comments()->save(factory(App\Comment::class)->make());
        // });
        factory(App\Comment::class,10)->create()->each(function($comment){
            $comment->replies()->save(factory(App\CommentReply::class)->make());
        });
    }
}

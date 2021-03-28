<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Image;
use App\Models\Level;
use App\Models\Location;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Faker\Factory;
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

        Group::factory(3)->create();
        Level::create(['name' => 'Oro']);
        Level::create(['name' => 'Plata']);
        Level::create(['name' => 'Bronce']);

        User::factory(5)->create()->each(function ($user) {
            $profile = $user->profile()->save(Profile::factory()->make());
            $profile->location()->save(Location::factory()->make());
            $user->groups()->attach($this->array(rand(1, 3)));
            $user->image()->save(Image::factory()->make(['url' => 'https://source.unsplash.com/collection/888146/300x300']));
        });

        Category::factory(10)->create();
        Tag::factory(20)->create();

        Post::factory(100)->create()->each(function ($post) {
            $post->image()->save(Image::factory()->make());
            $post->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 5);
            for ($i = 0; $i < $number_comments; $i++) {
                $post->comments()->save(Comment::factory()->make());
            }
        });
        Video::factory(50)->create()->each(function ($video) {
            $video->image()->save(Image::factory()->make());
            $video->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 5);
            for ($i = 0; $i < $number_comments; $i++) {
                $video->comments()->save(Comment::factory()->make());
            }
        });
    }

    function array($max) {
        $values = [];
        for ($i = 1; $i < $max; $i++) {
            $values[] = $i;
        }
        return $values;
    }
}

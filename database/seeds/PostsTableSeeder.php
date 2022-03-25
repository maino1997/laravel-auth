<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 4; $i++) {
            $post = new Post();

            $post->title = $faker->text(20);
            $post->content = $faker->sentence();
            $post->image = $faker->imageUrl(250, 250);

            $post->save();
        }
    }
}

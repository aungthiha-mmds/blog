<?php

use Illuminate\Database\Seeder;
use App\Blog;
use Faker\Factory as Faker;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $i){
            Blog::create([
                'user_id' => $i,
                'category_id' => $i,
                'title' => $faker->title,
                'content' => $faker->text,
                'status' => ($i > 8) ? '0' : '1',
                'edit' => ($i > 8) ? '0' : '1'
            ]);
        }
    }
}

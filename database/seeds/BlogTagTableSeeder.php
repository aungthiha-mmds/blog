<?php

use App\BlogTag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogTagTableSeeder extends Seeder
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
            DB::table('tag_blog')->insert([
                'blog_id' => $i,
                'tag_id' => $i,
            ]);
        }
    }
}

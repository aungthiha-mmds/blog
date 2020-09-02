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
        $this->call(UserTableSeeder::class);
        $this->call(CategroyTableSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(BlogTagTableSeeder::class);
    }
}

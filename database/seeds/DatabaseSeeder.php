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
        DB::table('tags')->insert(['name'=>'tags']);
        $this->call(UserSeed::class);
        $this->call(CategoriesSeed::class);
        $this->call(TopicsSeed::class);
        $this->call(CommentariesSeed::class);
        // $this->call(UsersTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>"test",
            'password' => Hash::make('123'),
            'email'=>'test@yandex.ru'
        ]);
        DB::table('tags')->insert(['name'=>'tags']);
        $this->call(UserSeed::class);
        $this->call(CategoriesSeed::class);
        $this->call(TopicsSeed::class);
        $this->call(CommentariesSeed::class);
        // $this->call(UsersTableSeeder::class);
    }
}

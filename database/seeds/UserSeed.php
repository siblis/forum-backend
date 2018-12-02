<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            DB::table('users')->insert([
                'username' => str_random(10),
                'user_email' => str_random(10).'@mail.ru',
                'password' => bcrypt('123456')
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class TopicsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            DB::table('topics')->insert([
                'category_id' => random_int(1,5),
                'user_id' => random_int(1,10),
                'tag_id' => 1,
                'title' => str_random(10),
                'description' => str_random(50),
                'content' => str_random(250)
            ]);
        }
    }
}

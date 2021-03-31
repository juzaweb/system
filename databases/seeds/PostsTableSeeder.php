<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Tadcms\Models\Post::class, 5)->create();
        
        //\App\User::update();
    }
}

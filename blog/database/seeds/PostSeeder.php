<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->truncate();

        $posts = [];
        $faker = Factory::create();
        $date = Carbon::create(2020,6,1,9);  //Y-M-D Hour
        

        for($i=0;$i<10;$i++){
            $image = "Post_Image_".rand(1,5).".jpg";
            $date = $date->addDays(1);
            $publishedDate = clone($date);
            $createddDate = clone($date);

            $posts[] =[
                'author_id' => rand(1,3),
                'title' => $faker->sentence(rand(8,12)),
                'excerpt' => $faker->text(rand(250,200)),
                'body' => $faker->paragraphs(rand(10,15),true),
                'slug' => $faker->slug(),
                'image' => rand(0,1) == 1 ? $image: NULL,
                'created_at' => $createddDate,
                'updated_at' => $createddDate,
                'published_at' => $i < 5 ? $publishedDate : ( rand(0,1) == 0 ? NULL : $publishedDate->addDays(4) )

            ];
        }
        DB::table('posts')->insert($posts);
    }
}

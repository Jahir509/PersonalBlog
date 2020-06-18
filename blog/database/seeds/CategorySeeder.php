<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'title' => 'Web Design',
                'slug' => 'Web Design'
            ],
            [
                'title' => 'Web Programming',
                'slug' => 'Web Programming'
            ],
            [
                'title' => 'Internet',
                'slug' => 'Internet'
            ],
            [
                'title' => 'Social Marketing',
                'slug' => 'Social Marketing'
            ],
            [
                'title' => 'Photography',
                'slug' => 'Photography'
            ],
            [
                'title' => 'Travelling',
                'slug' => 'Travelling'
            ]
        ]);
       
    }
}

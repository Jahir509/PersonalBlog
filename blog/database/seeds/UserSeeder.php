<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('users')->insert([
        [
            'name' => 'Jahir',
            'email' => 'jahir@gmail.com',
            'password' => bcrypt('123')
        ],
        [
            'name' => 'Jony',
            'email' => 'jony@gmail.com',
            'password' => bcrypt('123')
        ],
        [
            'name' => 'Masud',
            'email' => 'masud@gmail.com',
            'password' => bcrypt('123')
        ]
        ]);

    }
}

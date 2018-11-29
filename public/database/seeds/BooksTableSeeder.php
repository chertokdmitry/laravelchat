<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 3000; $i++) {
            DB::table('books')->insert([
                'title' => $faker->catchPhrase,
                'author_id' => $faker->numberBetween(1,100),
            ]);
        }

    }
}
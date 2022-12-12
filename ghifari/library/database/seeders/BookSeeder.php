<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 25; $i++){
            $book = new Book;

            $book->isbn = $faker->randomNumber(7);
            $book->title = $faker->sentence(5);
            $book->year = $faker->numberBetween('2007', '2022');

            $book->publisher_id = $faker->numberBetween(1, 20);
            $book->author_id = $faker->numberBetween(1,20);
            $book->catalog_id = $faker->numberBetween(1,4);

            $book->qty = $faker->numberBetween(10,20);
            $book->price = $faker->numberBetween(7000,45000);

            $book->save();
        }
        //
    }
}
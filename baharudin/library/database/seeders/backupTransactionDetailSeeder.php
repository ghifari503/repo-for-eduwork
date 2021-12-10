<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0; $i < 20; $i++) {
        	$transaction_detail = new TransactionDetail;

        	$transaction_detail->transaction_id = $faker->rand(1, 20);
        	$transaction_detail->book_id = $faker->rand(1, 20);
        	$transaction_detail->qty = $faker->rand(1, 3);

        	$transaction_detail->save();
        }
    }
}

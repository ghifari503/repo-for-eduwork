<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

    	for($i = 0; $i < 10; $i++){

            $transaction = new Transaction;

        	$transaction->member_id = rand(1, 20);
        	$transaction->date_start = $faker->dateTimeBetween('-3 days', 'now');
        	$transaction->date_end = $faker->dateTimeBetween('+3 days', '+6 days');
            $transaction->status = $faker->boolean(0 , 1);

        	$transaction->save();
    	}
    }
}

<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0; $i < 13; $i++)
        {
        	$transaction_detail = new TransactionDetail;

        	$transaction_detail->transaction_id = rand(1, 13);
        	$transaction_detail->book_id = rand(1, 25);
        	$transaction_detail->qty = rand(1, 3);

        	$transaction_detail->save();
        }
    }
}


<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create new user 1
        User::factory(1)->create();

        // Generate dummy data for member, publisher, author, catalog and book
        $this->call([
            MemberSeeder::class,
            PublisherSeeder::class,
            AuthorSeeder::class,
            CatalogSeeder::class,
            BookSeeder::class
        ]);

        // Add member_id 1 to user with id 1
        $user1 = User::find(1);
        $user1->member_id = 1;
        $user1->save();

        // Create new transaction 1
        $transaction = new Transaction();
        $transaction->member_id = mt_rand(2, 20);
        $transaction->date_start = Carbon::now()->format('Y-m-d');
        $transaction->date_end = Carbon::tomorrow()->format('Y-m-d');
        $transaction->save();

        // Create transaction Detail 1 (1st book)
        $transactionDetail = new TransactionDetail();
        $transactionDetail->transaction_id = $transaction->id;
        $transactionDetail->book_id = mt_rand(1, 20);
        $transactionDetail->qty = mt_rand(1, 2);
        $transactionDetail->save();

        // Create transaction Detail 2 (2nd book)
        $transactionDetail2 = new TransactionDetail();
        $transactionDetail2->transaction_id = $transaction->id;
        $transactionDetail2->book_id = mt_rand(1, 20);
        $transactionDetail2->qty = mt_rand(1, 2);
        $transactionDetail2->save();
    }
}

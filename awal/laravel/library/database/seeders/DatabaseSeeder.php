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
        $transaction1 = new Transaction();
        $transaction1->member_id = mt_rand(2, 20);
        $transaction1->date_start = Carbon::now()->format('Y-m-d');
        $transaction1->date_end = Carbon::tomorrow()->format('Y-m-d');
        $transaction1->status = true;
        $transaction1->save();

        // Create transaction Detail (1st book)
        $transactionDetail = new TransactionDetail();
        $transactionDetail->transaction_id = $transaction1->id;
        $transactionDetail->book_id = mt_rand(1, 20);
        $transactionDetail->save();

        // Create transaction Detail (2nd book)
        $transactionDetail2 = new TransactionDetail();
        $transactionDetail2->transaction_id = $transaction1->id;
        $transactionDetail2->book_id = mt_rand(1, 20);
        $transactionDetail2->save();

        // Create new transaction 2
        $transaction2 = new Transaction();
        $transaction2->member_id = mt_rand(2, 20);
        $transaction2->date_start = Carbon::now()->format('Y-m-d');
        $transaction2->date_end = Carbon::tomorrow()->format('Y-m-d');
        $transaction1->status = false;
        $transaction2->save();

        // Create transaction Detail (1st book)
        $transactionDetail = new TransactionDetail();
        $transactionDetail->transaction_id = $transaction2->id;
        $transactionDetail->book_id = mt_rand(1, 20);
        $transactionDetail->save();

        // Create transaction Detail (2nd book)
        $transactionDetail2 = new TransactionDetail();
        $transactionDetail2->transaction_id = $transaction2->id;
        $transactionDetail2->book_id = mt_rand(1, 20);
        $transactionDetail2->save();
    }
}

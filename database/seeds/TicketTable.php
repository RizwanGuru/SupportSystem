<?php

use Illuminate\Database\Seeder;
use App\Ticket;
class TicketTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ticket::class, 10)->create();
    }
}

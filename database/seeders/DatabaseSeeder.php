<?php

namespace Database\Seeders;

use App\Models\IncomingMail;
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
        \App\Models\User::factory(1)->create();
        IncomingMail::factory(10)->create();
    }
}

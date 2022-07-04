<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\IncomingMail;
use App\Models\User;
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
        User::factory(1)->create();
        Employee::factory(10)->create();
        IncomingMail::factory(10)->create();
    }
}

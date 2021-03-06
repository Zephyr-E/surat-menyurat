<?php

namespace Database\Seeders;

use App\Models\Decree;
use App\Models\Employee;
use App\Models\EmployeeReview;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
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
        foreach (range(1, 10) as $int) {
            OutgoingMail::factory()->create(['number' => $int]);
            Decree::factory()->create(['number' => $int]);
            EmployeeReview::factory()->create(['number' => $int]);
        }
    }
}

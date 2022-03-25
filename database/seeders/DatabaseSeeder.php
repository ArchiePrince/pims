<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        // App\Models\Participant::factory(100)->create();
        $this->call(UsersSeeder::class);
        $this->call(DepartmentsSeeder::class);

        $this->call(EventsSeeder::class);
        $this->call(EventTypesSeeder::class);

        $this->call(BatchesSeeder::class);
        $this->call(ParticipantsSeeder::class);

    }
}

<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Faker\Factory as Faker; // Import Faker

class UserTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->userSeed();
        $this->taskSeed();
    }

    public  function userSeed()
    {
        $faker = Faker::create(); // Create a Faker instance

        for ($i = 0; $i < 10; $i++) {
            do {
                $email = $faker->unique()->safeEmail;
            } while (User::where('email', $email)->exists()); // Check for uniqueness

            User::factory()->create([
                'name' => $faker->name,
                'email' => $email, // Use the unique email
                'status' => Arr::random(['active', 'inactive']),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ]);
        }
    }

    public  function taskSeed()
    {
        $faker = Faker::create(); // Create a Faker instance

        for ($i = 0; $i < 20; $i++) {
            Task::create([
                'title' => $faker->sentence,
            ]);
        }
    }
}

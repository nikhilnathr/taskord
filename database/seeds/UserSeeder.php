<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            'firstname' => 'Dabbit',
            'username' => 'test',
            'company' => 'Taskord',
            'bio' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'email' => 'test@test.com',
            'avatar' => 'https://github.com/dabbit.png',
            'password' => Hash::make('test'),
            'reputation' => 550,
            'website' => 'https://github.com/dabbit',
            'twitter' => $faker->userName,
            'twitch' => $faker->userName,
            'github' => $faker->userName,
            'telegram' => $faker->userName,
            'youtube' => $faker->userName,
            'onlyFollowingsTasks' => false,
            'isStaff' => true,
            'isDeveloper' => true,
            'isBeta' => true,
            'created_at' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now'),
        ]);

        foreach (range(1, 100) as $index) {
            DB::table('users')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'username' => $faker->unique()->userName,
                'company' =>  $faker->firstName,
                'bio' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'email' => $faker->unique()->email,
                'avatar' => 'https://avatar.tobi.sh/'.$faker->userName.'.svg?text='.strtoupper($faker->randomLetter).strtoupper($faker->randomLetter),
                'password' => Hash::make('test'),
                'reputation' => $faker->numberBetween($min = 50, $max = 150),
                'website' => 'https://example.com',
                'twitter' => $faker->userName,
                'twitch' => $faker->userName,
                'github' => $faker->userName,
                'telegram' => $faker->userName,
                'youtube' => $faker->userName,
                'isStaff' => false,
                'isDeveloper' => false,
                'isBeta' => false,
                'created_at' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now'),
            ]);
        }
    }
}

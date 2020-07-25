<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 500) as $index) {
            DB::table('answers')->insert([
                'user_id' => $faker->numberBetween($min = 1, $max = 50),
                'question_id' => $faker->numberBetween($min = 1, $max = 50),
                'answer' => $faker->sentence($nbWords = 30, $variableNbWords = true),
                'created_at' => $faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now'),
            ]);
        }
    }
}

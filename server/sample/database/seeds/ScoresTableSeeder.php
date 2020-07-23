<?php

use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scores')->insert([
            [
                'score' => 200,
                'user_id' => 1,
                'drill_id' => 1
            ],
            [
                'score' => 300,
                'user_id' => 2,
                'drill_id' => 2
            ],
            [
                'score' => 400,
                'user_id' => 3,
                'drill_id' => 3
            ],
        ]);
    }
}

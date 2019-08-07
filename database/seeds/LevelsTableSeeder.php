<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['id' => '1', 'name' => 'rookie'],
            ['id' => '2', 'name' => 'amateur'],
            ['id' => '3', 'name' => 'pro'],
        );

        DB::table('levels')->insert($data);
    }
}
 
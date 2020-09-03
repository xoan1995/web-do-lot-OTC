<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maps')->truncate();
        DB::table('maps')->insert([
            'text' => 'text',
            'info' => 'info',
            'maps' => 'maps'
        ]);
    }
}

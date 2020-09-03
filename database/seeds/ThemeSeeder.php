<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->truncate();
        DB::table('themes')->insert([
            'title'=>'title',
            'logo'=>'logo',
            'slogan'=>'slogan',
            'favicon'=>'favicon',
            'hotline'=>'hotline',
            'subfooter'=>'subfooter',
            'slogan'=>'slogan',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Date;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                    [
                        'name' => 'Google',
                        'url' => 'https://google.com',
                        'created_at' => Date::now(),
                        'updated_at' => Date::now()
                    ],
                    [
                        'name' => 'Facebook',
                        'url' => 'https://facebook.com',
                        'created_at' => Date::now(),
                        'updated_at' => Date::now()
                    ]
                ];
        DB::table('websites')->insert($data);
    }
}

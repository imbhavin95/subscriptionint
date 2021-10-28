<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class SubscriberSeeder extends Seeder
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
                'email' => 'alexs@gmail.com',
                'first_name' => 'Alex',
                'last_name' => 'Smith',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'email' => 'rickyh@gmail.com',
                'first_name' => 'Ricky',
                'last_name' => 'Hougue',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        ];
        DB::table('subscribers')->insert($data);
    }
}

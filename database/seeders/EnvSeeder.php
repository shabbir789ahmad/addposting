<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Env;
class EnvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Env::insert([

            [
               
                 
                'email' => 'shabbir789shahid@gmail.com', 
               
                'password' => 'xbnunvtxndegqgmu'
            ]

        ]);
    }
}

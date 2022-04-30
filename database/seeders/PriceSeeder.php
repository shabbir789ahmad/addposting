<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Price;
class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::insert([

            [
               
                'price1' => '20', 
                
               
               ] ,
               [
               
                'price1' => '30', 
                
               ] 
            ]);
    }
}

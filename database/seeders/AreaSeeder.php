<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;
class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Area::insert([

            [
               
                'areaunit' => 'Kanal', 
            ] ,
            [
               
                'areaunit' => 'Marla', 
            ] ,
            [
               
                'areaunit' => 'Square Feet', 
            ] ,
            [
               
                'areaunit' => 'Square Meter', 
            ] ,
            [
               
                'areaunit' => 'Square Yard', 
            ] ,
              
            ]);
    }
}

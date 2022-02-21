<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;
class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::insert([

            [
               
                'property' => 'Property for sale', 
                
               
               ] ,
               [
               
                'property' => 'Property for Rent', 
                
               
               ] 
            ]);
    }
}

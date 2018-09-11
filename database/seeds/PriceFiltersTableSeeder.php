<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceFiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('price_filters')->insert([
                'name' => "Filtre de prix ".$i,
                'quantity' => mt_rand(10, 1000)
            ]);            
        }
    }
}

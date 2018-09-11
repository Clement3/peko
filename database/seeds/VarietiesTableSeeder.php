<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VarietiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {

            $name = "Varieté ".$i;

            DB::table('varieties')->insert([
                'slug' => str_slug($name, "-"),
                'name' => $name,
                'stock' => mt_rand(0, 100),
                'category_id' => mt_rand(1, 5)
            ]);            
        }
    }
}

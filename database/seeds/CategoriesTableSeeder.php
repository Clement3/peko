<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {

            $name = "Categorie ".$i;

            DB::table('categories')->insert([
                'slug' => str_slug($name, "-"),
                'name' => $name
            ]);            
        }
    }
}

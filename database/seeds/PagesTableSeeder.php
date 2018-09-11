<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 4; $i++) {
            
            $title = "Pages ".$i;

            DB::table('pages')->insert([
                'slug' => str_slug($title, "-"),
                'title' => $title,
                'body' => "Lorem ipsum",
                'created_at' => Date('Y-m-d H:i:s')
            ]);            
        }
    }
}

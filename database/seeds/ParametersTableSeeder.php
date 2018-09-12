<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameters')->insert([
            'meta' => 'app_title',
            'value' => 'Aux paniers de Péko'
        ]);

        DB::table('parameters')->insert([
            'meta' => 'app_description',
            'value' => 'Vente de légumes de frais...'
        ]);        
    }
}

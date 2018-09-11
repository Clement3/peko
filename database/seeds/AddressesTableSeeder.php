<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
                
            DB::table('addresses')->insert([
                'title' => 'maison',
                'user_id' => mt_rand(1, 10),
                'firstname' => 'Clem',
                'lastname' => 'Nico',
                'address' => '1 rue de là bas',
                'complement' => ' ',
                'postal_code' => '5555',
                'city' => 'Lodève',
                'phone' => '0606060606',
                'created_at' => Date('Y-m-d H:i:s')
            ]);  
     
        }
    }
}

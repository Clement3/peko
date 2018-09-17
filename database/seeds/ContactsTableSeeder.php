<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('contacts')->insert([
                'fullname' => "Contact ".$i,
                'object' => "sujet de .. ",
                'message' => "lorem lorem lorem",
                'is_read' => 1,
                'created_at' => Date('Y-m-d H:i:s')
            ]);            
        }
    }
}

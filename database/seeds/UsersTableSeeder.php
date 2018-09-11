<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        DB::table('users')->insert([
            'name' => 'Administrateur',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'firstname' => 'John',
            'lastname' => 'Doe',
            'created_at' => Date('Y-m-d H:i:s'),
            'role_id' => 2
        ]);

        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => 'Client '.$i,
                'email' => 'client' .$i . '@client.com',
                'password' => bcrypt('client'),
                'firstname' => 'John',
                'lastname' => 'Doe',
                'created_at' => Date('Y-m-d H:i:s'),
                'role_id' => 1
            ]);
        }
    }
}

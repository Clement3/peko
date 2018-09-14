<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            AddressesTableSeeder::class,
            CategoriesTableSeeder::class,
            VarietiesTableSeeder::class,
            PriceFiltersTableSeeder::class,
            ProductsTableSeeder::class,
            NewslettersTableSeeder::class,
            SlidersTableSeeder::class,
            PagesTableSeeder::class,
            ContactsTableSeeder::class
        ]);
    }
}

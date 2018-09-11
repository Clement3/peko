<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $title = "Product ". $i;

            DB::table('products')->insert([
                'slug' => str_slug($title, "-"),
                'title' => $title,
                'price' => mt_rand(5, 100),
                'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer euismod elit quis neque venenatis ultricies. Suspendisse iaculis lorem sed velit sodales volutpat. Proin at mauris finibus, sodales orci sed, pulvinar ante. Aliquam ornare lacus in aliquam gravida. Pellentesque ut pulvinar erat. Proin sollicitudin lacus vel volutpat pharetra. Mauris luctus mollis mollis. Nam nec ligula pharetra, placerat ex eget, efficitur dolor. Nam faucibus diam sit amet odio dapibus, et volutpat nulla semper. ",
                'created_at' => Date('Y-m-d H:i:s'),
                'variety_id' => mt_rand(1, 10),
                'price_filter_id' => mt_rand(1, 5)
            ]);
        }            
    }
}

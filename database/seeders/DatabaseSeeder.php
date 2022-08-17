<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Category::factory(10)->create();
        \App\Models\Product::factory(20)->create();
        \App\Models\Client::factory(15)->create();
        \App\Models\Address::factory(15)->create();
        \App\Models\ClientOrder::factory(30)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;
use App\Models\Restaurants;
use Carbon\Carbon;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seeds the suppliers table
        Supplier::insert([
            ['name' => 'Bibendum Ireland', 'email' => 'therese.otoole@bibendum-wine.ie', 'phone' => '0845 263 6924'],
            ['name' => 'Birra Moretti', 'email' => 'notpepsi@gmail.com', 'phone' => '1800 317 318'],
            ['name' => 'SupplFrylite', 'email' => 'supplfrylite', 'phone' => '02871383133'],
            ['name' => 'Hugh Jordan', 'email' => 'hughjordan@gmail.com', 'phone' => '555 123-4567'],
            ['name' => 'Peninsula', 'email' => 'peninsula@gmail.com', 'phone' => '555 987-6543']
        ]);
    }
}

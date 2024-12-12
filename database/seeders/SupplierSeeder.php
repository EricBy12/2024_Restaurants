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
        //Remember to give these actual values!!!
        //Seeds the reviews table
        Supplier::insert([
            ['name' => 'Supplier 1', 'email' => 'supplier1@gmail.com', 'phone' => 'phoneNumber 1'],
            ['name' => 'Supplier 2', 'email' => 'supplier2@gmail.com', 'phone' => 'phoneNumber 2'],
            ['name' => 'Supplier 3', 'email' => 'supplier3@gmail.com', 'phone' => 'phoneNumber 3'],
            ['name' => 'Supplier 4', 'email' => 'supplier4@gmail.com', 'phone' => 'phoneNumber 4'],
            ['name' => 'Supplier 5', 'email' => 'supplier5@gmail.com', 'phone' => 'phoneNumber 5']
        ]);
    }
}

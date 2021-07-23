<?php

namespace Database\Seeders;

use App\Imports\InventoryImport;
use App\Imports\ProductsImport;
use App\Imports\UsersImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Excel::import(new UsersImport, 'users.csv');
        Excel::import(new InventoryImport, 'inventory.csv');
        Excel::import(new ProductsImport, 'products.csv');
    }
}

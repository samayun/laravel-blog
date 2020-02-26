<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into categories (id, name) values (?, ?)', [1, 'Frontend']);
        DB::insert('insert into categories (id, name) values (?, ?)', [2, 'Backend']);
        DB::insert('insert into categories (id, name) values (?, ?)', [3, 'Database']);

    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into roles (id, name) values (?, ?)', [1, 'administrator']);
        DB::insert('insert into roles (id, name) values (?, ?)', [2, 'author']);
        DB::insert('insert into roles (id, name) values (?, ?)', [3, 'subscriber']);
    }
}
